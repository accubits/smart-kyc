var smartkycApp = angular.module('smartkycApp', []);
smartkycApp.controller('resetCtrl', function ($scope,$http) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.userDetails=JSON.parse(localStorage.getItem("adminDetails"));
    console.log($scope.userDetails.unique_id);

    $scope.passDeatils = {
        "oldpass": "",
        "password": "",
        "reenterpassword": ""
    }

    $scope.logout = function(){
        localStorage.removeItem('adminDetails');
        window.location = 'index.html';

    }

    $scope.resetPassword = function (){

        console.log($scope.passDeatils)
        if($scope.passDeatils.oldpass == "" || $scope.passDeatils.password == ""){
            showError('Please enter all the details','error',true);
            return;
        }
        if($scope.passDeatils.password != $scope.passDeatils.reenterpassword){
            showError("Password doesn't match",'error',true);
            return;
        }
        var data = 'oldPassword='+ $scope.passDeatils.oldpass +
            '&&userRegistration_uniqueId='+$scope.userDetails.unique_id +
            '&&userRegistration_password='+ $scope.passDeatils.password;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'updatePassword.php',
            data: postData
        };

        // Making API Call [start]
        $http(requestObj).success(function (data) {
            console.log(data);
            showError('successfully updated password','success',true);
            $scope.passDeatils = {
                "oldpass": "",
                "password": "",
                "reenterpassword": ""
            }
        }).error(function (data, err) {
            console.log(data);
            console.log(err);

            showError(data["error"],'error',true);
        });

    };
});