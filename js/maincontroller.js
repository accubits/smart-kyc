
var crypbrokersApp = angular.module('crypbrokersApp', []);
crypbrokersApp.controller('crypbrokersCntl', function ($scope,$http) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    $scope.nextButton1=false;
    $scope.nextButton2=false;
    $scope.user={
        firstName:'',
        lastName:'',
        gender:'',
        address1:'',
        address2:'',
        address3:'',
        city:'',
        state:'',
        countryOfResidence:'',
        zip:'',
        mobile:'',
        dateOfBirth:'',
        idType:'',
        idNumber:'',
        idIssueDate:'',
        idValidTo:'',
    };
    $scope.company={
        name:'',
        phone:'',
        url:'',
        bussibessNature:'',
        custmerType:'',
        customerInfoQ:'',
        userUrlQ:'',
        exptAvgOrder:'',
        activityNatureQ:'',
        bankDetailsQ:'',
    };
    /* add user details function [Start] */
    $scope.addUserInformation = function (){
            if(!$scope.user.firstName){
                // showError('Please enter name','error',false);
                return;
            }
        //    to find gender
        var find = $('.active').attr('id');
            console.log(find);
        if (find == 1){
            $scope.user.gender = 1;
            console.log("genderis"+$scope.user.gender)
        }
        else if (find == 0){
            $scope.user.gender = 0;
            console.log("genderis"+$scope.user.gender)
        }

            console.log($('#dob').val())

        $scope.user.dateOfBirth= $('#dob').val();
        $scope.user.idIssueDate=$('#issueDate').val();
        $scope.user.idValidTo=$('#validTo').val();


        console.log('users_first_name='+ $scope.user.firstName + '&&users_last_name=' +
                $scope.user.lastName + '&&users_gender=' + $scope.user.gender+
                '&&users_address1='+ $scope.user.address1 + '&&users_address2='+$scope.user.address2+
                '&&users_address3=' +$scope.user.address3+'&&users_city=' +$scope.user.city+
                '&&users_state='+ $scope.user.state + '&&users_country_residence='+$scope.user.countryOfResidence +
                '&&users_zip='+ $scope.user.zip + '&&users_mobile_number='+$scope.user.mobile +
                '&&users_date_of_birth='+ $scope.user.dateOfBirth + '&&users_id_type='+$scope.user.idType+
                '&&users_id_number='+ $scope.user.idNumber + '&&users_id_issue_date='+$scope.user.idIssueDate+
                '&&users_id_valid_date='+ $scope.user.idValidTo);
            var data = 'users_first_name='+ $scope.user.firstName + '&&users_last_name=' +
                $scope.user.lastName + '&&users_gender=' + $scope.user.gender+
                '&&users_address1='+ $scope.user.address1 + '&&users_address2='+$scope.user.address2+
                '&&users_address3=' +$scope.user.address3+'&&users_city=' +$scope.user.city+
                '&&users_state='+ $scope.user.state + '&&users_country_residence='+$scope.user.countryOfResidence +
                '&&users_zip='+ $scope.user.zip + '&&users_mobile_number='+$scope.user.mobile +
                '&&users_date_of_birth='+ $scope.user.dateOfBirth + '&&users_id_type='+$scope.user.idType+
                '&&users_id_number='+ $scope.user.idNumber + '&&users_id_issue_date='+$scope.user.idIssueDate+
                '&&users_id_valid_date='+ $scope.user.idValidTo;

        var postData = data;
            var requestObj = {
                method: 'POST',
                url: ServerApi+'addInfo.php',
                data: postData
            };

            // Making API Call [start]
            $http(requestObj).success(function (data) {
                console.log(data);
                $scope.uniqurId= data.result.users_uniqueId;
                $scope.nextButton1=true;
                showError('successfully added user information','success',true)

            }).error(function (data, err) {
              console.log(data);
                console.log(err);
                showError('errooooor','error',false)


            });
    };
    /* add user details function [End] */

    /* add company details function [Start] */
    $scope.addCompanyInformation = function (){

        var data = 'company_name='+ $scope.company.name + '&&company_phone_number=' +
            $scope.company.phone + '&&company_url=' + $scope.company.url+
            '&&company_bussiness_nature='+ $scope.company.bussibessNature + '&&company_customer_type_q=' +$scope.company.custmerType+
            '&&company_customer_info_q='+ $scope.company.customerInfoQ + '&&company_user_url_q='+$scope.company.userUrlQ +
            '&&company_expt_avgorder_q='+ $scope.company.exptAvgOrder + '&&company_activity_nature_q='+$scope.company.activityNatureQ +
            '&&company_bankdetails_q='+ $scope.company.bankDetailsQ;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'addCompanyInfo.php',
            data: postData
        };

        // Making API Call [start]
        $http(requestObj).success(function (data) {
            console.log(data);
            $scope.nextButton2=true;
            showError('successfully added Company information','success',true)
        }).error(function (data, err) {
            console.log(data);
            console.log(err);

        });

    };
    /* add company details function [End] */
//init functions
    $scope.imageUpload = function () {
        console.log($('#my-awesome-dropzone').val());
        console.log($scope.data.images)
    }


});


