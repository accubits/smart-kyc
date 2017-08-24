<?php
require dirname(dirname(__FILE__)).'/libraries/DataBaseHandler.php';

class dbconfig
{
    /** @var string - Redis */
    public $HOST     = 'localhost';
    public $USER     = 'root';
    public $PASSWORD = 'Accubits@123';
    public $DB_NAME  = 'crypbrokers';


    public $REDIS_HOST   = '127.0.0.1';
    public $REDIS_PORT   = '6379';
    public $REDIS_EXPIRY = '10000';

    /** @var string - Tables */
    public $Table_users                     = 'users';
    public $Table_company                   = 'company';
    public $Table_usersImage                =  'usersImage';

    public $COL_users_unique_id             = 'users_uniqueId';
    public $COL_users_first_name            = 'users_first_name';
    public $COL_users_last_name             = 'users_last_name';
    public $COL_users_gender                = 'users_gender';
    public $COL_users_address               = 'users_address';
    public $COL_users_city                  = 'users_city';
    public $COL_users_state                 = 'users_state';
    public $COL_users_country_residence     = 'users_country_residence';
    public $COL_users_zip                   = 'users_zip';
    public $COL_users_mobile_code           = 'users_mobile_code';
    public $COL_users_mobile_number         = 'users_mobile_number';
    public $COL_users_date_of_birth         = 'users_date_of_birth';
    public $COL_users_passport_id           = 'users_passport_id';
    public $COL_users_id_issue_date         = 'users_id_issue_date';
    public $COL_users_id_valid_date         = 'users_id_valid_date';
    public $COL_users_image                 = 'users_image';


    public $COL_company_unique_id           = 'company_unique_id';
    public $COL_company_name                = 'company_name';
    public $COL_company_tax_id              = 'company_tax_id';
    public $COL_company_address             = 'company_address';
    public $COL_company_city                = 'company_city';
    public $COL_company_state               = 'company_state';
    public $COL_company_country_residence   = 'company_country_residence';
    public $COL_company_zip                 = 'company_zip';
    public $COL_company_country_code        = 'company_country_code';
    public $COL_company_phone_number        = 'company_phone_number';
    public $COL_company_url                 = 'company_url';
    public $COL_company_bussiness_nature    = 'company_bussiness_nature';
    public $COL_company_customer_type_q     = 'company_customer_type_q';
    public $COL_company_info_q              = 'company_info_q';
    public $COL_company_bankdetails_q       = 'company_bankdetails_q';
    public $COL_company_expt_monthvolume_q  = 'company_expt_monthvolume_q';
    public $COL_company_activity_anture_q   = 'company_activity_anture_q';
    public $COL_company_others              = 'company_others';


    public $COL_usersImage_unique_id           = 'usersImage_unique_id';
    public $COL_usersImage_users_unique_id     = 'users_unique_id';
    public $COL_usersImage_image     = 'users_image';

//    public $TOKEN                        = 'token';
//    public $pageNo                       = 'pageNo';
//    public $limit                        = 'limit';
//    public $text                         = 'text';

//    public $baseUrl                      = "http://icosys.local/";
//    public $serverMailUrl                = "http://52.220.41.10/icosys/server/mail/index.php";
//    public $server                       = "http://52.220.41.10";
//    public $forgotPasswordServerLink     = "http://52.220.41.10/icosys/frontend/view/forgot.html";


}

$config = new dbconfig();
$db = new DataBaseHandler();
$db->openDatabase($config);
