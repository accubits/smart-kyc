smartkycApp.controller('userDetailCtrl', function ($scope,$http) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.userDetails=JSON.parse(localStorage.getItem("adminDetails"));
    $scope.userID= localStorage.getItem("userID");
    console.log($scope.userDetails.unique_id);

    $scope.logout = function(){
        localStorage.removeItem('adminDetails');
        window.location = 'index.html';

    }
    $scope.loading = true;
    function getUserDetails(){

        var data = 'userRegistration_uniqueId='+$scope.userID;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'getUserDetails.php',
            data: postData
        };

        // Making API Call [start]
        $http(requestObj).success(function (data) {
            console.log(data);
            $scope.loading = false;
            var user = data["result"]["data"];
            var userImage = data["result"]["image"];
            for(var item in user){

                switch (item){
                    case "users_gender":
                        console.log(user[item]);
                        if(user[item] == 1){
                            user["gender"] = 'Male';
                        }
                        else{
                            user["gender"] = 'Female';
                        }
                        break;
                    case "users_id_type":
                        if(user[item] == 1){
                            user["id_type"] = ""
                        }
                }
            }

            $scope.user = user;

            for(var item in userImage){
                userImage[item]["usersImage_image"] = 'http://52.220.41.10/crypbrokers/uploads/images/' + userImage[item]["usersImage_image"];
            }
            $scope.userImage = userImage;

        }).error(function (data, err) {
            console.log(data);
            console.log(err);
            try{
                if(data["error"]){
                    showError(data["error"],'error',false);
                }
            }
            catch (e){
                showError('Something went wrong','error',false);
            }




        });
    }
    getUserDetails();

    $scope.updateStatus = function(status){
        var data = 'userRegistration_uniqueId='+$scope.userID+
            '&&status=' + status;
        console.log(data);

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'updateVerificationStatus.php',
            data: postData
        };
        showError('Loading','loading',false);
        $http(requestObj).success(function (data) {
            console.log(data);
            $scope.details = data.result;
            console.log($scope.details);

            $scope.user.users_verify_status = 1;

            showError('Successfully updated the status','success',true);

        }).error(function (data, err) {
            console.log(data);
            console.log(err);
            showError('error','error',true);
        });
    }


});