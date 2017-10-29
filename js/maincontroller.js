
var smartkycApp = angular.module('smartkycApp', []);
smartkycApp.controller('crypbrokersCntl', function ($scope,$http) {
    $http.defaults.headers.post["Accept"] = "";
    $http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
    $scope.userDetails=JSON.parse(localStorage.getItem("userDetails"));

    $scope.logout = function(){
        localStorage.removeItem('userDetails');
        window.location = 'index.html';

    };
    if(!localStorage.getItem("userDetails")){
        window.location = 'index.html';
    }

    $scope.nextButton1=true;
    $scope.nextButton2=true;
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
        email: ''
    };
    $scope.general ={
        email: "",
        mobile: ""
    }
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


    $scope.countries = [
        {name: 'Afghanistan', code: 'AF'},
        {name: 'Åland Islands', code: 'AX'},
        {name: 'Albania', code: 'AL'},
        {name: 'Algeria', code: 'DZ'},
        {name: 'American Samoa', code: 'AS'},
        {name: 'AndorrA', code: 'AD'},
        {name: 'Angola', code: 'AO'},
        {name: 'Anguilla', code: 'AI'},
        {name: 'Antarctica', code: 'AQ'},
        {name: 'Antigua and Barbuda', code: 'AG'},
        {name: 'Argentina', code: 'AR'},
        {name: 'Armenia', code: 'AM'},
        {name: 'Aruba', code: 'AW'},
        {name: 'Australia', code: 'AU'},
        {name: 'Austria', code: 'AT'},
        {name: 'Azerbaijan', code: 'AZ'},
        {name: 'Bahamas', code: 'BS'},
        {name: 'Bahrain', code: 'BH'},
        {name: 'Bangladesh', code: 'BD'},
        {name: 'Barbados', code: 'BB'},
        {name: 'Belarus', code: 'BY'},
        {name: 'Belgium', code: 'BE'},
        {name: 'Belize', code: 'BZ'},
        {name: 'Benin', code: 'BJ'},
        {name: 'Bermuda', code: 'BM'},
        {name: 'Bhutan', code: 'BT'},
        {name: 'Bolivia', code: 'BO'},
        {name: 'Bosnia and Herzegovina', code: 'BA'},
        {name: 'Botswana', code: 'BW'},
        {name: 'Bouvet Island', code: 'BV'},
        {name: 'Brazil', code: 'BR'},
        {name: 'British Indian Ocean Territory', code: 'IO'},
        {name: 'Brunei Darussalam', code: 'BN'},
        {name: 'Bulgaria', code: 'BG'},
        {name: 'Burkina Faso', code: 'BF'},
        {name: 'Burundi', code: 'BI'},
        {name: 'Cambodia', code: 'KH'},
        {name: 'Cameroon', code: 'CM'},
        {name: 'Canada', code: 'CA'},
        {name: 'Cape Verde', code: 'CV'},
        {name: 'Cayman Islands', code: 'KY'},
        {name: 'Central African Republic', code: 'CF'},
        {name: 'Chad', code: 'TD'},
        {name: 'Chile', code: 'CL'},
        {name: 'China', code: 'CN'},
        {name: 'Christmas Island', code: 'CX'},
        {name: 'Cocos (Keeling) Islands', code: 'CC'},
        {name: 'Colombia', code: 'CO'},
        {name: 'Comoros', code: 'KM'},
        {name: 'Congo', code: 'CG'},
        {name: 'Congo, The Democratic Republic of the', code: 'CD'},
        {name: 'Cook Islands', code: 'CK'},
        {name: 'Costa Rica', code: 'CR'},
        {name: 'Cote D\'Ivoire', code: 'CI'},
        {name: 'Croatia', code: 'HR'},
        {name: 'Cuba', code: 'CU'},
        {name: 'Cyprus', code: 'CY'},
        {name: 'Czech Republic', code: 'CZ'},
        {name: 'Denmark', code: 'DK'},
        {name: 'Djibouti', code: 'DJ'},
        {name: 'Dominica', code: 'DM'},
        {name: 'Dominican Republic', code: 'DO'},
        {name: 'Ecuador', code: 'EC'},
        {name: 'Egypt', code: 'EG'},
        {name: 'El Salvador', code: 'SV'},
        {name: 'Equatorial Guinea', code: 'GQ'},
        {name: 'Eritrea', code: 'ER'},
        {name: 'Estonia', code: 'EE'},
        {name: 'Ethiopia', code: 'ET'},
        {name: 'Falkland Islands (Malvinas)', code: 'FK'},
        {name: 'Faroe Islands', code: 'FO'},
        {name: 'Fiji', code: 'FJ'},
        {name: 'Finland', code: 'FI'},
        {name: 'France', code: 'FR'},
        {name: 'French Guiana', code: 'GF'},
        {name: 'French Polynesia', code: 'PF'},
        {name: 'French Southern Territories', code: 'TF'},
        {name: 'Gabon', code: 'GA'},
        {name: 'Gambia', code: 'GM'},
        {name: 'Georgia', code: 'GE'},
        {name: 'Germany', code: 'DE'},
        {name: 'Ghana', code: 'GH'},
        {name: 'Gibraltar', code: 'GI'},
        {name: 'Greece', code: 'GR'},
        {name: 'Greenland', code: 'GL'},
        {name: 'Grenada', code: 'GD'},
        {name: 'Guadeloupe', code: 'GP'},
        {name: 'Guam', code: 'GU'},
        {name: 'Guatemala', code: 'GT'},
        {name: 'Guernsey', code: 'GG'},
        {name: 'Guinea', code: 'GN'},
        {name: 'Guinea-Bissau', code: 'GW'},
        {name: 'Guyana', code: 'GY'},
        {name: 'Haiti', code: 'HT'},
        {name: 'Heard Island and Mcdonald Islands', code: 'HM'},
        {name: 'Holy See (Vatican City State)', code: 'VA'},
        {name: 'Honduras', code: 'HN'},
        {name: 'Hong Kong', code: 'HK'},
        {name: 'Hungary', code: 'HU'},
        {name: 'Iceland', code: 'IS'},
        {name: 'India', code: 'IN'},
        {name: 'Indonesia', code: 'ID'},
        {name: 'Iran, Islamic Republic Of', code: 'IR'},
        {name: 'Iraq', code: 'IQ'},
        {name: 'Ireland', code: 'IE'},
        {name: 'Isle of Man', code: 'IM'},
        {name: 'Israel', code: 'IL'},
        {name: 'Italy', code: 'IT'},
        {name: 'Jamaica', code: 'JM'},
        {name: 'Japan', code: 'JP'},
        {name: 'Jersey', code: 'JE'},
        {name: 'Jordan', code: 'JO'},
        {name: 'Kazakhstan', code: 'KZ'},
        {name: 'Kenya', code: 'KE'},
        {name: 'Kiribati', code: 'KI'},
        {name: 'Korea, Democratic People\'S Republic of', code: 'KP'},
        {name: 'Korea, Republic of', code: 'KR'},
        {name: 'Kuwait', code: 'KW'},
        {name: 'Kyrgyzstan', code: 'KG'},
        {name: 'Lao People\'S Democratic Republic', code: 'LA'},
        {name: 'Latvia', code: 'LV'},
        {name: 'Lebanon', code: 'LB'},
        {name: 'Lesotho', code: 'LS'},
        {name: 'Liberia', code: 'LR'},
        {name: 'Libyan Arab Jamahiriya', code: 'LY'},
        {name: 'Liechtenstein', code: 'LI'},
        {name: 'Lithuania', code: 'LT'},
        {name: 'Luxembourg', code: 'LU'},
        {name: 'Macao', code: 'MO'},
        {name: 'Macedonia, The Former Yugoslav Republic of', code: 'MK'},
        {name: 'Madagascar', code: 'MG'},
        {name: 'Malawi', code: 'MW'},
        {name: 'Malaysia', code: 'MY'},
        {name: 'Maldives', code: 'MV'},
        {name: 'Mali', code: 'ML'},
        {name: 'Malta', code: 'MT'},
        {name: 'Marshall Islands', code: 'MH'},
        {name: 'Martinique', code: 'MQ'},
        {name: 'Mauritania', code: 'MR'},
        {name: 'Mauritius', code: 'MU'},
        {name: 'Mayotte', code: 'YT'},
        {name: 'Mexico', code: 'MX'},
        {name: 'Micronesia, Federated States of', code: 'FM'},
        {name: 'Moldova, Republic of', code: 'MD'},
        {name: 'Monaco', code: 'MC'},
        {name: 'Mongolia', code: 'MN'},
        {name: 'Montserrat', code: 'MS'},
        {name: 'Morocco', code: 'MA'},
        {name: 'Mozambique', code: 'MZ'},
        {name: 'Myanmar', code: 'MM'},
        {name: 'Namibia', code: 'NA'},
        {name: 'Nauru', code: 'NR'},
        {name: 'Nepal', code: 'NP'},
        {name: 'Netherlands', code: 'NL'},
        {name: 'Netherlands Antilles', code: 'AN'},
        {name: 'New Caledonia', code: 'NC'},
        {name: 'New Zealand', code: 'NZ'},
        {name: 'Nicaragua', code: 'NI'},
        {name: 'Niger', code: 'NE'},
        {name: 'Nigeria', code: 'NG'},
        {name: 'Niue', code: 'NU'},
        {name: 'Norfolk Island', code: 'NF'},
        {name: 'Northern Mariana Islands', code: 'MP'},
        {name: 'Norway', code: 'NO'},
        {name: 'Oman', code: 'OM'},
        {name: 'Pakistan', code: 'PK'},
        {name: 'Palau', code: 'PW'},
        {name: 'Palestinian Territory, Occupied', code: 'PS'},
        {name: 'Panama', code: 'PA'},
        {name: 'Papua New Guinea', code: 'PG'},
        {name: 'Paraguay', code: 'PY'},
        {name: 'Peru', code: 'PE'},
        {name: 'Philippines', code: 'PH'},
        {name: 'Pitcairn', code: 'PN'},
        {name: 'Poland', code: 'PL'},
        {name: 'Portugal', code: 'PT'},
        {name: 'Puerto Rico', code: 'PR'},
        {name: 'Qatar', code: 'QA'},
        {name: 'Reunion', code: 'RE'},
        {name: 'Romania', code: 'RO'},
        {name: 'Russian Federation', code: 'RU'},
        {name: 'RWANDA', code: 'RW'},
        {name: 'Saint Helena', code: 'SH'},
        {name: 'Saint Kitts and Nevis', code: 'KN'},
        {name: 'Saint Lucia', code: 'LC'},
        {name: 'Saint Pierre and Miquelon', code: 'PM'},
        {name: 'Saint Vincent and the Grenadines', code: 'VC'},
        {name: 'Samoa', code: 'WS'},
        {name: 'San Marino', code: 'SM'},
        {name: 'Sao Tome and Principe', code: 'ST'},
        {name: 'Saudi Arabia', code: 'SA'},
        {name: 'Senegal', code: 'SN'},
        {name: 'Serbia and Montenegro', code: 'CS'},
        {name: 'Seychelles', code: 'SC'},
        {name: 'Sierra Leone', code: 'SL'},
        {name: 'Singapore', code: 'SG'},
        {name: 'Slovakia', code: 'SK'},
        {name: 'Slovenia', code: 'SI'},
        {name: 'Solomon Islands', code: 'SB'},
        {name: 'Somalia', code: 'SO'},
        {name: 'South Africa', code: 'ZA'},
        {name: 'South Georgia and the South Sandwich Islands', code: 'GS'},
        {name: 'Spain', code: 'ES'},
        {name: 'Sri Lanka', code: 'LK'},
        {name: 'Sudan', code: 'SD'},
        {name: 'Suriname', code: 'SR'},
        {name: 'Svalbard and Jan Mayen', code: 'SJ'},
        {name: 'Swaziland', code: 'SZ'},
        {name: 'Sweden', code: 'SE'},
        {name: 'Switzerland', code: 'CH'},
        {name: 'Syrian Arab Republic', code: 'SY'},
        {name: 'Taiwan, Province of China', code: 'TW'},
        {name: 'Tajikistan', code: 'TJ'},
        {name: 'Tanzania, United Republic of', code: 'TZ'},
        {name: 'Thailand', code: 'TH'},
        {name: 'Timor-Leste', code: 'TL'},
        {name: 'Togo', code: 'TG'},
        {name: 'Tokelau', code: 'TK'},
        {name: 'Tonga', code: 'TO'},
        {name: 'Trinidad and Tobago', code: 'TT'},
        {name: 'Tunisia', code: 'TN'},
        {name: 'Turkey', code: 'TR'},
        {name: 'Turkmenistan', code: 'TM'},
        {name: 'Turks and Caicos Islands', code: 'TC'},
        {name: 'Tuvalu', code: 'TV'},
        {name: 'Uganda', code: 'UG'},
        {name: 'Ukraine', code: 'UA'},
        {name: 'United Arab Emirates', code: 'AE'},
        {name: 'United Kingdom', code: 'GB'},
        {name: 'United States', code: 'US'},
        {name: 'United States Minor Outlying Islands', code: 'UM'},
        {name: 'Uruguay', code: 'UY'},
        {name: 'Uzbekistan', code: 'UZ'},
        {name: 'Vanuatu', code: 'VU'},
        {name: 'Venezuela', code: 'VE'},
        {name: 'Viet Nam', code: 'VN'},
        {name: 'Virgin Islands, British', code: 'VG'},
        {name: 'Virgin Islands, U.S.', code: 'VI'},
        {name: 'Wallis and Futuna', code: 'WF'},
        {name: 'Western Sahara', code: 'EH'},
        {name: 'Yemen', code: 'YE'},
        {name: 'Zambia', code: 'ZM'},
        {name: 'Zimbabwe', code: 'ZW'}
    ];
    $scope.idType = ["Passport", "Drivers Licence", "Other Gov Issued Photo ID"];



    function getUserDetails(){
        // if(! $scope.userDetails.unique_id){
        //     return;
        // }
        var data = 'userRegistration_uniqueId='+$scope.userDetails.unique_id;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'getUserDetails.php',
            data: postData
        };

        // Making API Call [start]
        $http(requestObj).success(function (data) {
            console.log(data);
            //$scope.uniqurId= data.result.users_uniqueId;
            //$scope.nextButton1=true;
            //showError('successfully added user information','success',true);

            var user = data["result"]["data"];
            $scope.userImage = data["result"]["image"]

            $scope.user={
                firstName: user["users_first_name"],
                lastName: user["users_last_name"],
                gender: user["users_gender"],
                address1:user["users_address1"],
                address2:user["users_address2"],
                address3:user["users_address3"],
                city:user["users_city"],
                state:user["users_state"],
                countryOfResidence:user["users_country_residence"],
                zip:user["users_zip"],
                mobile:user["users_mobile_number"],
                dateOfBirth:user["users_date_of_birth"],
                idType:user["users_id_type"],
                idNumber:user["users_id_number"],
                idIssueDate:user["users_id_issue_date"],
                idValidTo:user["users_id_valid_date"],
                email: user["userRegistration_email"]
            };

            $scope.company={
                name:user["company_name"],
                phone:user["company_phone_number"],
                url:user["company_url"],
                bussibessNature:user["company_bussiness_nature"],
                custmerType:user["company_customer_type_q"],
                customerInfoQ:user["company_customer_info_q"],
                userUrlQ:user["company_user_url_q"],
                exptAvgOrder:user["company_expt_avgorder_q"],
                activityNatureQ:user["company_activity_nature_q"],
                bankDetailsQ:user["company_bankdetails_q"],
            };
            $scope.general.email = $scope.user.email;
            $scope.general.mobile = $scope.user.mobile;

            console.log($scope.user.email);

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

    /* add user details function [Start] */
    $scope.addUserInformation = function ($event){
        console.log('users_first_name='+ $scope.user.firstName + '&&users_last_name=' +
            $scope.user.lastName + '&&users_gender=' + $scope.user.gender+
            '&&users_address1='+ $scope.user.address1 + '&&users_address2='+$scope.user.address2+
            '&&users_address3=' +$scope.user.address3+'&&users_city=' +$scope.user.city+
            '&&users_state='+ $scope.user.state + '&&users_country_residence='+$scope.user.countryOfResidence +
            '&&users_zip='+ $scope.user.zip + '&&users_mobile_number='+$scope.user.mobile +
            '&&users_date_of_birth='+ $scope.user.dateOfBirth + '&&users_id_type='+$scope.user.idType+
            '&&users_id_number='+ $scope.user.idNumber + '&&users_id_issue_date='+$scope.user.idIssueDate+
            '&&users_id_valid_date='+ $scope.user.idValidTo);
        console.log($scope.user.countryOfResidence)
            if(!$scope.user.firstName || !$scope.user.lastName || !$scope.user.address1 || !$scope.user.city || !$scope.user.state
                || !$scope.user.countryOfResidence || !$scope.user.zip ||  !$scope.user.idType || !$scope.user.idNumber || !$scope.user.mobile){
                showError('Please enter all the details','error',true);
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
                '&&userRegistration_uniqueId='+$scope.userDetails.unique_id +
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
                showError('successfully added user information','success',true);
                // person_next();

                /*for switching tabs*/
                var dataid = angular.element($event.target).attr('data-id');
                go(dataid);

            }).error(function (data, err) {
              console.log(data);
                console.log(err);
                try{
                    if(data["error"]){
                        showError(data["error"],'error',true);
                    }
                }
                catch (e){
                    showError('Something went wrong','error',true);
                }




            });
    };
    /* add user details function [End] */

    /* add company details function [Start] */
    $scope.addCompanyInformation = function ($event){


        if(!$scope.company.name || !$scope.company.phone || !$scope.company.url || !$scope.company.bussibessNature
        || !$scope.company.custmerType || !$scope.company.customerInfoQ || !$scope.company.userUrlQ || !$scope.company.exptAvgOrder
        || !$scope.company.activityNatureQ || !$scope.company.bankDetailsQ){
            showError('Please enter all the details','error',true);
            return;
        }
        var data = 'company_name='+ $scope.company.name +
            '&&company_phone_number=' + $scope.company.phone +
            '&&company_url=' + $scope.company.url+
            '&&company_bussiness_nature='+ $scope.company.bussibessNature +
            '&&company_customer_type_q=' +$scope.company.custmerType+
            '&&company_customer_info_q='+ $scope.company.customerInfoQ +
            '&&company_user_url_q='+$scope.company.userUrlQ +
            '&&company_expt_avgorder_q='+ $scope.company.exptAvgOrder +
            '&&company_activity_nature_q='+$scope.company.activityNatureQ +
            '&&userRegistration_uniqueId='+$scope.userDetails.unique_id +
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
            // company_next();

            /*for switching tabs*/
            var dataid = angular.element($event.target).attr('data-id');
            go(dataid);
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
        //console.log($scope.data.images);

        if($('#declaration').prop('checked')){
            //showError('Please enter the details', "error", true);
            return;
        }
    }

    $scope.verifyDoc = function(){
        if(!$('#declaration').prop('checked')){
            showError('Please accept the declaration.', "error", true);
            return;
        }
        uploadFile();
    }
    $scope.thankshow=false;
    $scope.thankhide=true;
    function uploadFile(){

        if(!$('#files').prop('files')[0] || $('#files').prop('files')[0] == undefined){
            // window.location.href = 'verify.html';
            $scope.thankhide=false;
            $scope.thankshow=true;
            return;
        }
        var files = $scope.files;
        var fd = new FormData();
        var url = ServerApi + 'uploadDocuments.php';
        showError('Uploading...', "loading", false);

        var index = 1;
        console.log($('.uploadFile'))
        $('.uploadFile').each(function(){
            if(!$(this).prop('files').length){
                return true;
            }
            fd.append('image'+index, $(this).prop('files')[0]);
            index++;
        });
        var data = {};

        fd.append("usersImage_userRegistration_unique_id", $scope.userDetails.unique_id);

        $.ajax({
            url: url,
            type: 'POST',
            data: fd,
            cache: false,
            dataType: 'multipart/form-data',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function (data, textStatus, jqXHR) {
                hideError();
                showError('Uploaded the documents', "success", true);
                console.log("success")

            },
            error: function (jqXHR, textStatus, errorThrown) {

                var result = JSON.parse(jqXHR["responseText"]);
                if (result["success"]) {
                    ////console.log(result);
                    hideError();
                    $scope.$apply(function () {
                        $scope.thankhide=false;
                        $scope.thankshow=true;
                    });

                    console.log("success _23");
                    console.log($scope.thankshow)
                    showError('Uploaded the documents', "success", true);
                    // window.location.href = 'verify.html';
                }
                else {
                    console.log(jqXHR);
                    var error = JSON.parse(jqXHR.responseText);
                    hideError();
                    if (jqXHR.status == 403) {
                        //showError('Please Login...', 'error', false);
                        setTimeout(function () {
                            $scope.logout();
                        }, 500);
                    }
                    else if (JSON.parse(jqXHR.responseText)['error']) {
                        var error_s = JSON.parse(jqXHR.responseText)['error'];
                        hideError();
                        showError(error_s, "error", true);

                    }
                    else if (jqXHR.status == 500) {
                        showError('Internal error', 'error', true);
                    }
                }
            }
        });
    }

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    $scope.updateGeneral = function (){

        console.log($scope.general)
        if($scope.general.mobile == "" || $scope.general.email == ""){
            showError('Please enter all the details','error',true);
            return;
        }
        if(!validateEmail($scope.general.email)){
            showError('Please enter a valid email','error',true);
            return ;
        }
        // if(!phonenumber($scope.general.mobile)){
        if(($scope.general.mobile) == ""){
            showError('Please enter a valid phone number','error',true);
            return ;
        }
        var data = 'users_mobile_number='+ $scope.general.mobile +
            '&&userRegistration_uniqueId='+$scope.userDetails.unique_id +
            '&&userRegistration_email='+ $scope.general.email;

        var postData = data;
        var requestObj = {
            method: 'POST',
            url: ServerApi+'updateUserDetails.php',
            data: postData
        };

        // Making API Call [start]
        $http(requestObj).success(function (data) {
            console.log(data);
            showError('successfully updated details','success',true);

            $scope.user.email = $scope.general.email;
            $scope.user.mobile = $scope.general.mobile;
        }).error(function (data, err) {
            console.log(data);
            console.log(err);

        });

    };

});


