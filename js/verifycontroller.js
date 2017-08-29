crypbrokersApp.controller('verifyCntl', function ($scope,$http) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.userDetails=JSON.parse(localStorage.getItem("userDetails"));
    console.log($scope.userDetails);

    $scope.verify= function (){


        var data = 'users_uniqueId=0c9fe679bd8a8ce92082a252f7db6c0b';

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'getInfo.php',
            data: postData
        };
        $http(requestObj).success(function (data) {
            console.log(data);
            $scope.details = data.result[0];
            console.log($scope.details);

        }).error(function (data, err) {
            console.log(data);
            console.log(err);
            showError('errooooor','error',true)


        });
    };
    $scope.verify();
});