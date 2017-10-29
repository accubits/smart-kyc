
smartkycApp.controller('verifyCntl', function ($scope,$http) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

    $scope.userDetails=JSON.parse(localStorage.getItem("userDetails"));
    console.log($scope.userDetails.unique_id);

    $scope.passDeatils = {
        "oldpass": "",
        "password": "",
        "reenterpassword": ""
    }
    $scope.order = {
        "name": "",
        "country" :"",
        "email": "",
        "phone": "",
        "amount": "",
        "type": "",
        "message": ""
    }

    $scope.verify= function (){

        var data = 'userRegistration_uniqueId='+$scope.userDetails.unique_id;
        console.log(data);

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'getInfo.php',
            data: postData
        };
        $http(requestObj).success(function (data) {
            console.log(data);
            $scope.details = data.result[0];
            $scope.user = data["result"][0];
            if(!data.result.length){
                $scope.user = {};
                $scope.user["users_verify_status"] = 0;

                return;
            }
            console.log($scope.user["users_verify_status"]);
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
    $scope.verify();

    $scope.resetPassword = function (){

        console.log($scope.passDeatils)
        if($scope.passDeatils.oldpass == "" || $scope.passDeatils.password == "" || $scope.passDeatils.reenterpassword == ""){
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
            showError(data.error,'error',true);
            console.log(err);

        });

    };

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        // var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
        return re.test(email);
    }
    function phonenumber(inputtxt) {
        var phoneno = /^([+|\d])+([\s|\d])+([\d])$/;
        return phoneno.test(inputtxt);
    }
    $scope.placeOrder = function (){
        console.log($scope.passDeatils)
        if($scope.order.name == "" || $scope.order.country == "" || $scope.order.email == "" || $scope.order.phone == ""
        || $scope.order.amount == "" || $scope.order.message == ""){
            showError('Please enter all the details','error',true);
            return;
        }
        if(!validateEmail($scope.order.email)){
            showError('Please enter a valid email','error',true);
            return ;
        }
        if(!phonenumber($scope.order.phone)){
            showError('Please enter a valid phone number','error',true);
            return ;
        }
        if(!$('#terms').prop('checked')){
            showError('Please verify the terms and conditions','error',true);
            return ;
        }

        showError('Creating order..','loading',true);
        var data = 'order_name='+ $scope.order.name +
            '&&order_user_uniqueId='+$scope.userDetails.unique_id +
            '&&order_country='+ $scope.order.country+
            '&&order_email='+ $scope.order.email+
            '&&order_phone='+ $scope.order.phone+
            '&&order_amount='+ $scope.order.amount+
            '&&order_type='+ $scope.order.type+
            '&&order_message='+ $scope.order.message;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'placeOrder.php',
            data: postData
        };

        // Making API Call [start]
        $http(requestObj).success(function (data) {
            console.log(data);
            showError('successfully submitted order','success',true);
            $scope.order = {
                "name": "",
                "country" :"",
                "email": "",
                "phone": "",
                "amount": "",
                "type": "",
                "message": ""
            }
            $('#terms').prop('checked', false);
        }).error(function (data, err) {
            showError('Try again with appropriate parameters','error',true);
            console.log(data);
            console.log(err);

        });

    };

    $scope.changeTab = function($event){
        var id = $($event.target).attr('data-id');
        $('.tab_wrap li').removeClass('active');
        $($event.target).addClass('active');
console.log(id)
        $('.tab_content').removeClass('active');
        $('#orders').addClass('active');
    }

});