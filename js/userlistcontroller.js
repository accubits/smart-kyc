crypbrokersApp.controller('userlistCntl', function ($scope,$http) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.userDetails=JSON.parse(localStorage.getItem("adminDetails"));
    console.log($scope.userDetails.unique_id);

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
            if($scope.details.users_gender == '1'){
                $scope.details.gender = 'Male'
            }
            else if($scope.details.users_gender == '0'){
                $scope.details.gender = 'Female'
            }

        }).error(function (data, err) {
            console.log(data);
            console.log(err);
            showError('errooooor','error',true)
        });
    };
    $scope.getlist();
});