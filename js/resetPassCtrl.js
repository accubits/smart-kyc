smartkycApp.controller('verifyCntl', function ($scope,$http) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.userDetails=JSON.parse(localStorage.getItem("userDetails"));
    // console.log($scope.userDetails.unique_id);

    $scope.passDeatils = {
        "password": "",
        "reenterpassword": ""
    }
    console.log("1");
    try{
        var id = window.location.search.substr(7);
        console.log("2");
        if(id == "" || id == undefined ){
            window.location = 'index.html';
            console.log("3");
        }
    }
    catch(e){
        console.log("4");
        window.location = 'index.html';
    }
    console.log("5");



    $scope.resetPassword = function (){



        console.log($scope.passDeatils)
        if($scope.passDeatils.password == ""){
            showError('Please enter the password','error',true);
            return;
        }
        if($scope.passDeatils.password != $scope.passDeatils.reenterpassword){
            showError("Password doesn't match",'error',true);
            return;
        }
        var data = 'token='+ id +
            '&&userRegistration_password='+ $scope.passDeatils.password;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'resetPassword.php',
            data: postData
        };

        // Making API Call [start]
        $http(requestObj).success(function (data) {
            console.log(data);
            showError('successfully updated password','success',true);
            $scope.passDeatils = {
                "password": "",
                "reenterpassword": ""
            };
            console.log("6");
            window.location = 'index.html';
        }).error(function (data, err) {
            console.log(data);
            console.log(err);
            showError(data["error"],'error',true)
        });

    };
});