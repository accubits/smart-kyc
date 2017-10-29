smartkycApp.controller('loginCntl', function ($scope,$http,$window) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    $scope.details={
        email:'',
        password:'',
    };
    $scope.forgot = {
        "email": ""
    };
    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $scope.logIn= function (){
        if (!$scope.details.email && !$scope.details.password){
            showError('Please enter your details','error',true);
            return;
        }
        if(!validateEmail($scope.details.email)){
            showError('Please enter email','error',true);
            return ;
        }
        if(!$scope.details.password){
            showError('Please enter password','error',true);
            return;
        }

        console.log('userRegistration_email='+$scope.details.email+
            '&&userRegistration_password='+$scope.details.password);
        var data = 'userRegistration_email='+$scope.details.email+
            '&&userRegistration_password='+$scope.details.password;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'login.php',
            data: postData
        };
        $scope.blockbutton= true;
        showError('Loading','loading',false);
        $http(requestObj).success(function (data) {
            console.log(data);
            localStorage.setItem("userDetails",JSON.stringify(data));
            $scope.blockbutton= false;
            if(data["type"] == "1"){
                $window.location.href = 'admin/user_list.html';
                showError('Successfully loggedIn','success',true);
            }
            else{
                $window.location.href = 'verify.html';
                showError('Successfully loggedIn','success',true);
            }



        }).error(function (data, err) {
            console.log(data);
            console.log(err);

            if(data["error"] == "Invalid Credentials"){
                showError('Invalid Credentials','error',true);
                return;
            }
            else if(data["error"] == "Email verification pending"){
                showError('Email verification pending','error',true);
                return;
            }


            showError('Something went wrong. Try again','error',true)


        });
    };
    $scope.switchPassBox = function(type){

        $('.login_block').removeClass('active');

        if(type == 0){
            $('#login_block').addClass('active');
        }
        else{
            $('#frgt_block').addClass('active');
        }
    };

    $scope.forgotPass = function(){

        if (!$scope.forgot.email){
            showError('Please enter your email','error',true);
            return;
        }
        if(!validateEmail($scope.forgot.email)){
            showError('Please enter a valid email','error',true);
            return ;
        }

        var data = 'userRegistration_email='+$scope.forgot.email;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'forgotPassword.php',
            data: postData
        };
        $scope.blockbutton= true;
        showError('Loading','loading',false);
        $http(requestObj).success(function (data) {
            console.log(data);
            $scope.blockbutton= false;
            showError('Please check email for password reset','success',true);

            $scope.forgot.email = "";
            $scope.switchPassBox(0);

        }).error(function (data, err) {
            console.log(data);
            console.log(err);

            showError(data["error"],'error',true);


        });
    }
});