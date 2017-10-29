smartkycApp.controller('userlistCntl', function ($scope,$http) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.userDetails=JSON.parse(localStorage.getItem("adminDetails"));
    console.log($scope.userDetails.unique_id);
    $scope.logout = function(){
        localStorage.removeItem('adminDetails');
        window.location = 'index.html';

    };
    $scope.loading = true;
    $scope.getlist= function (){
        var data = 'userRegistration_uniqueId='+$scope.userDetails.unique_id;
        console.log(data);

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'getAllUsers.php',
            data: postData
        };
        $http(requestObj).success(function (data) {
            console.log(data);
            $scope.details = data.result;
            console.log($scope.details);
            $scope.loading = false;
            if($scope.details.users_gender == '1'){
                $scope.details.gender = 'Male'
            }
            else if($scope.details.users_gender == '0'){
                $scope.details.gender = 'Female'
            }
            var users = data.result;
            for(var item in users){
                users[item]["created_date"] = new Date(users[item]["created_date"]);
                switch (users[item]["users_verify_status"]){
                    case "0":
                            users[item]["users_kyc_status"] = "Pending";
                        break;
                    case "1":
                        users[item]["users_kyc_status"] = "Approved";
                        break;
                    case "2":
                        users[item]["users_kyc_status"] = "Rejected";
                        break;
                }
                switch (users[item]["users_account_type"]){
                    case "0":
                        users[item]["users_account_type"] = "Personal";
                        break;
                    case "1":
                        users[item]["users_account_type"] = "Company";
                        break;
                }
            }

            $scope.details = users;

        }).error(function (data, err) {
            console.log(data);
            console.log(err);
            showError('error','error',true)
        });
    };
    $scope.getlist();

    $scope.goToUserPage = function(id){


        localStorage.setItem("userID",id);
        window.location.href = 'detailed_view.html';
    }
});