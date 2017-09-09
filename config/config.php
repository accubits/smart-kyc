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
    public $Table_emailVerification         = 'emailVerification';
    public $Table_userRegistration          = 'userRegistration';
    public $Table_order                     = 'orders';

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
    public $COL_users_account_type          = 'users_account_type';
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

    public $COL_userRegistration_unique_id                  = 'userRegistration_uniqueId';
    public $COL_userRegistration_username                   = 'userRegistration_username';
    public $COL_userRegistration_email                      = 'userRegistration_email';
    public $COL_userRegistration_password                   = 'userRegistration_password';
    public $COL_userRegistration_status                     = 'userRegistration_status';
    public $COL_userRegistration_email_verify_status        = 'userRegistration_verify_status';

    public $COL_forgotPassword_token           = 'token';
    public $COL_forgotPassword_uniqueId        = 'uniqueId';

    public $COL_emailVerification_token           = 'email_token';
    public $COL_emailVerification_uniqueId        = 'email_uniqueId';

    public $COL_order_uniqueId                  = 'uniqueId';
    public $COL_order_user_uniqueId             = 'order_user_uniqueId';
    public $COL_order_name                      = 'order_name';
    public $COL_order_country                   = 'order_country';
    public $COL_order_email                     = 'order_email';
    public $COL_order_phone                     = 'order_phone';
    public $COL_order_amount                    = 'order_amount';
    public $COL_order_type                      = 'order_type';
    public $COL_order_message                   = 'order_message';
    public $COL_order_status                    = 'order_status';


    public $TOKEN                              = 'token';
    
    public static function emailContentResetPassword($name,$link) {
        
        return "<!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <base href=\"http://52.220.41.10/crypbrokers/\"/>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>CrypBrokers</title>
    <!--<link href=\"https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat|Open+Sans|Raleway:300|Roboto:300\" rel=\"stylesheet\">-->
    <!--<link href=\"http://allfont.net/allfont.css?fonts=montserrat-light\" rel=\"stylesheet\" type=\"text/css\" />-->
</head>
<body style=\"width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;\">
<center>
    <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important; margin:0; padding:0; width:100% !important; background-color:#f7f8fb;\">
        <tbody>
        <tr>
            <td style=\"text-align: center\">
                <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important; margin:0 auto;text-align: center; padding:0; width:100% !important; background-color:#f7f8fb;\">
                    <tbody>


                    <tr style=\"background-color: #f7f8fb;\">
                        <td style=\"margin: 0 auto;\">
                            <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important;width:90% !important;margin:0 auto;background-color: #f7f8fb;\">
                                <tbody>

                                <!-- Repeating tr starts-->

                                <tr style=\"background-color: #f7f8fb;\">
                                    <td colspan=\"2\" style=\"margin: 0 auto;\">
                                        <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important;width:90% !important;margin:0 auto;background-color: white;\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_log.png\" style=\"width: 200px\">
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>


                                <tr style=\"background-color: #f7f8fb;\">
                                    <td colspan=\"2\" style=\"margin: 0 auto;\">
                                        <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important;width:90% !important;margin:0 auto;background-color: #f7f8fb;\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;background-color: white\">
                                                    <p style=\"text-align: center;font-size: 24px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">Hello ".$name.",</p>
                                                </td>


                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>


                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr style=\"background-color: #f7f8fb;\">
                                    <td colspan=\"2\" style=\"margin: 0 auto;\">
                                        <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important;width:90% !important;margin:0 auto;background-color: #f7f8fb;\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;background-color: white\">
                                                    <p style=\"display:inline-block;max-width:400px;text-align: center;font-size: 14px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;padding: 0 5px\">
                                                       We have received a request to reset the password of you account. Please click below link to reset your password <br>
                                                    </p>
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <td colspan=\"2\" style=\"margin: 0 auto;\">
                                    <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important;width:90% !important;margin:0 auto;background-color: #f7f8fb;\">
                                        <tbody>
                                        <tr>
                                            <td style=\"text-align: center;width: 100%;background-color: white\">
                                                <p style=\"text-align: center;font-size: 14px;font-family: 'Montserrat Light', sans-serif;color: #cacaca;line-height: 1.5;\">
                                                    For more details logon to
                                                </p>
                                                <p>
                                                    <a href=".$link." style=\"color: #fff; text-decoration: none\"> <div style=\"display: inline-block;background-color: #FFC107;font-family: 'Montserrat Light', sans-serif;padding: 7px 30px;border-radius: 20px;color: #f7f8fb;font-size: 12px;\">RESET PASSWORD</div></a>
                                                </p>
                                            </td>
                                            <td style=\"text-align: right;width: 40%;\">
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                                </tr>

                                <tr style=\"background-color: #f7f8fb;\">
                                    <td colspan=\"2\" style=\"margin: 0 auto;\">
                                        <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important;width:90% !important;margin:0 auto;background-color: #f7f8fb;\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_btm_mail.png\" style=\"width: 100%\">
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>




                                </tbody>
                            </table>



                        </td>
                    </tr>

                    <tr>
                        <td style=\"margin: 0 auto;\">
                            <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important;width:100% !important;background-color: #f7f8fb;\">
                                <tbody>
                                <tr>
                                    <td style=\"text-align: center;\"><span style=\"font-size: 10px;color: #999999;font-family: 'Montserrat Light', sans-serif;\">Copyright © Crypto Ventures LLC 2017. All Rights Reserved</span></td>
                                </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>



                    <tr>
                        <td style=\"margin: 0 auto;\">
                            <table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" style=\"height:auto !important;width:100% !important;background-color: #f7f8fb;padding-top: 4%;padding-bottom: 4%;\">
                                <tbody>
                                <tr>
                                </tr>
                                </tbody>
                            </table>

                        </td>
                    </tr>

                    </tbody>

                </table>
            </td>



        </tr>
        </tbody>
    </table>
</center>

</body>
</html>";
        
    }
    
}

$config = new dbconfig();
$db = new DataBaseHandler();
$db->openDatabase($config);
