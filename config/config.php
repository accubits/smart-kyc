<?php
require dirname(dirname(__FILE__)).'/libraries/DataBaseHandler.php';

class dbconfig
{
    /** @var string - Redis */
    public $HOST     = 'localhost';
    public $USER     = 'root';
    public $PASSWORD = 'accubits';
//    public $PASSWORD = 'Accubits@123';
    public $DB_NAME  = 'crypbrokers';


    public $REDIS_HOST   = '127.0.0.1';
    public $REDIS_PORT   = '6379';
    public $REDIS_EXPIRY = '10000';

    /** @var string - Tables */
    public $Table_users                     = 'users';
    public $Table_company                   = 'company';
    public $Table_usersImage                = 'usersImage';
    public $Table_forgotPassword            = 'forgotPassword';
    public $Table_userRegistration          = 'userRegistration';

    /*Table_users*/

    public $COL_users_unique_id             = 'users_uniqueId';
    public $COL_users_first_name            = 'users_first_name';
    public $COL_users_verify_status         = 'users_verify_status';
    public $COL_users_last_name             = 'users_last_name';
    public $COL_users_gender                = 'users_gender';
    public $COL_users_address1              = 'users_address1';
    public $COL_users_address2              = 'users_address2';
    public $COL_users_address3              = 'users_address3';
    public $COL_users_city                  = 'users_city';
    public $COL_users_state                 = 'users_state';
    public $COL_users_country_residence     = 'users_country_residence';
    public $COL_users_zip                   = 'users_zip';
    public $COL_users_mobile_number         = 'users_mobile_number';
    public $COL_users_date_of_birth         = 'users_date_of_birth';
    public $COL_users_id_type               = 'users_id_type';
    public $COL_users_id_number             = 'users_id_number';
    public $COL_users_id_issue_date         = 'users_id_issue_date';
    public $COL_users_id_valid_date         = 'users_id_valid_date';
    public $COL_users_userRegistration_unique_id = 'userRegistration_uniqueId';

    /*Table_company*/

    public $COL_company_unique_id           = 'company_unique_id';
    public $COL_company_name                = 'company_name';
    public $COL_company_phone_number        = 'company_phone_number';
    public $COL_company_url                 = 'company_url';
    public $COL_company_bussiness_nature    = 'company_bussiness_nature';
    public $COL_company_customer_type_q     = 'company_customer_type_q';
    public $COL_company_customer_info_q     = 'company_customer_info_q';
    public $COL_company_user_url_q          = 'company_user_url_q';
    public $COL_company_expt_avgorder_q     = 'company_expt_avgorder_q';
    public $COL_company_activity_nature_q   = 'company_activity_nature_q';
    public $COL_company_bankdetails_q       = 'company_bankdetails_q';

    /*Table_usersImage*/

    public $COL_usersImage_unique_id                       = 'usersImage_unique_id';
    public $COL_usersImage_userRegistration_unique_id     = 'usersImage_userRegistration_unique_id';
    public $COL_usersImage_image                           = 'usersImage_image';
    
    /*Table_userRegistration*/

    public $COL_userRegistration_unique_id     = 'userRegistration_uniqueId';
    public $COL_userRegistration_username      = 'userRegistration_username';
    public $COL_userRegistration_email         = 'userRegistration_email';
    public $COL_userRegistration_password      = 'userRegistration_password';
    public $COL_userRegistration_status        = 'userRegistration_status';

    public $COL_forgotPassword_token           = 'token';
    public $COL_forgotPassword_uniqueId        = 'uniqueId';

    public $TOKEN                              = 'token';
    
    public function emailContentUploadSuccess($name) {
        
        return "";
        
    }
    
}

$config = new dbconfig();
$db = new DataBaseHandler();
$db->openDatabase($config);
