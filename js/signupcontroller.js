smartkycApp.controller('signupCntl', function ($scope,$http,$window) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    $scope.details={
        name:'',
        email:'',
        password:'',
        reenterpassword:''
    };
    $scope.signUp= function (){
        if (!$scope.details.name && !$scope.details.password && !$scope.details.email){
            showError('Please enter your details','error',true);
            return;
        }
        if(!$scope.details.name){
            showError('Please enter name','error',true);
            return;
        }
        if(!isNaN($scope.details.email.split('@')[0])){
            showError('Please enter email','error',true);
            return ;
        }
        if(!$scope.details.password){
            showError('Please enter password','error',true);
            return;
        }
        if($scope.details.password != $scope.details.reenterpassword){
            showError('Please re-enter password','error',true);
            return;
        }

        console.log( 'userRegistration_username='+$scope.details.name+
            '&&userRegistration_email='+$scope.details.email+
            '&&userRegistration_password='+$scope.details.password);
        var data = 'userRegistration_username='+$scope.details.name+
            '&&userRegistration_email='+$scope.details.email+
            '&&userRegistration_password='+$scope.details.password;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'userRegistration.php',
            data: postData
        };
        $scope.blockbutton= true;
        showError('Loading','loading',false);
        $http(requestObj).success(function (data) {
            console.log(data);
            $scope.details={
                name:'',
                email:'',
                password:'',
                reenterpassword:''
            };
            $scope.blockbutton= false;
            showError('Please check your email for email Id verification','success',false);
            setTimeout(function(){
                $window.location.href = 'index.html';
            }, 3000);

        }).error(function (data, err) {
            console.log(data);
            console.log(err);
            showError('errooooor','error',false)


        });
    };
});