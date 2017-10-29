<?php
require dirname(dirname(__FILE__)).'/libraries/DataBaseHandler.php';

class dbconfig
{
    public static $emailBaseUrl = "http://smartkyc.ml";

    /** @var string - Redis */
    public $HOST     = 'localhost';
    public $USER     = 'root';
    public $PASSWORD = '';
    public $DB_NAME  = 'smartkyc';


    /** @var string - Email config */

    public $EMAIL_HOST = 'smtp.gmail.com';
    public $EMAIL_USERNAME = "example@smartkyc.com";
    public $EMAIL_PASSWORD = "pass";

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

    public static $adminMail = "admin@smarktyc.com";
    
    public static function emailContentResetPassword($name,$link) {
        
        return "
        <!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <base href=".dbconfig::$emailBaseUrl."/>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>SmartKYC</title>
    <!--<link href=\"https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat|Open+Sans|Raleway:300|Roboto:300\" rel=\"stylesheet\">-->
    <!--<link href=\"http://allfont.net/allfont.css?fonts=montserrat-light\" rel=\"stylesheet\" type=\"text/css\" />-->
</head>
<body style=\"width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" style=\"background-color: #f7f8fb;padding: 5% 0;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- BEGIN TEMPLATE // -->
                <!--[if gte mso 9]>
                <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"max-width:600px;\">
                    <tr>
                        <td align=\"center\" valign=\"top\" width=\"600\" style=\"width:600px;\">
                <![endif]-->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"max-width: 600px\">
                    <tbody>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;background-color: white\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;text-align: center;padding-top: 3%\">
                                            <tr>
                                                <td>
                                                    <img src=\"images/cryp_log.png\" style=\"width: 200px\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 24px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">Hello ".$name."</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style=\"background-color: #f7f8fb;\">
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;width: 90%;margin: auto\">
                                                        We have received a request to reset the password of your account. Please click the link below to reset your password.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;background-color: white\">
                                                    <p>
                                                        <a href=".$link." style=\"color: #fff; text-decoration: none\"> <div style=\"display: inline-block;background-color: #FFC107;font-family: 'Montserrat Light', sans-serif;padding: 7px 30px;border-radius: 20px;color: #f7f8fb;font-size: 12px;\">RESET PASSWORD</div></a>
                                                    </p>
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_btm_mail.png\" style=\"width: 100%\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: transparent\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;\"><span style=\"font-size: 10px;color: #999999;font-family: 'Montserrat Light', sans-serif;\">Copyright © 2017 smartKYC. All Rights Reserved.</span></td>
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
                <!--[if gte mso 9]>
                </td>
                </tr>
                </table>
                <![endif]-->
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";
        
    }
    public static function emailContentUploadSuccesfull($name){

        return "<!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <base href=".dbconfig::$emailBaseUrl."/>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>SmartKYC</title>
    <!--<link href=\"https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat|Open+Sans|Raleway:300|Roboto:300\" rel=\"stylesheet\">-->
    <!--<link href=\"http://allfont.net/allfont.css?fonts=montserrat-light\" rel=\"stylesheet\" type=\"text/css\" />-->
</head>
<body style=\"width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" style=\"background-color: #f7f8fb;padding: 5% 0;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- BEGIN TEMPLATE // -->
                <!--[if gte mso 9]>
                <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"max-width:600px;\">
                    <tr>
                        <td align=\"center\" valign=\"top\" width=\"600\" style=\"width:600px;\">
                <![endif]-->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"max-width: 600px\">
                    <tbody>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;background-color: white\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;text-align: center;padding-top: 3%\">
                                            <tr>
                                                <td>
                                                    <img src=\"images/cryp_log.png\" style=\"width: 200px\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 24px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">Hello ".$name."</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style=\"background-color: #f7f8fb;\">
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: justify;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Thank you for completing our online KYC forms and submitting your supporting documents.  Our compliance team is currently reviewing your application.
                                                    </p>
                                                    </br>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Should our team have any further queries, they will get in touch with you.
                                                    </p>
                                                    </br>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Best Regards,
                                                    </p>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        SmartKYC
                                                    </p>
                                                </td>
                                            </tr>
                                      </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;background-color: white\">
                                                    <p style=\"text-align: center;font-size: 14px;font-family: 'Montserrat Light', sans-serif;color: #cacaca;line-height: 1.5;\">
                                                        For more details login to
                                                    </p>
                                                    <p>
                                                        <a href=".dbconfig::$emailBaseUrl." style=\"color: #fff; text-decoration: none\"> <div style=\"display: inline-block;background-color: #FFC107;font-family: 'Montserrat Light', sans-serif;padding: 7px 30px;border-radius: 20px;color: #f7f8fb;font-size: 12px;\">SMARTKYC</div></a>
                                                    </p>
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_btm_mail.png\" style=\"width: 100%\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: transparent\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;\"><span style=\"font-size: 10px;color: #999999;font-family: 'Montserrat Light', sans-serif;\">Copyright © 2017 SmartKYC.com. All Rights Reserved.</span></td>
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
                <!--[if gte mso 9]>
                </td>
                </tr>
                </table>
                <![endif]-->
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";
    }
    public static function emailContentVerificationSuccesfull($name){

        return "
        <!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <base href=".dbconfig::$emailBaseUrl."/>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>SmartKYC</title>
    <!--<link href=\"https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat|Open+Sans|Raleway:300|Roboto:300\" rel=\"stylesheet\">-->
    <!--<link href=\"http://allfont.net/allfont.css?fonts=montserrat-light\" rel=\"stylesheet\" type=\"text/css\" />-->
</head>
<body style=\"width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" style=\"background-color: #f7f8fb;padding: 5% 0;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- BEGIN TEMPLATE // -->
                <!--[if gte mso 9]>
                <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"max-width:600px;\">
                    <tr>
                        <td align=\"center\" valign=\"top\" width=\"600\" style=\"width:600px;\">
                <![endif]-->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"max-width: 600px\">
                    <tbody>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;background-color: white\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;text-align: center;padding-top: 3%\">
                                            <tr>
                                                <td>
                                                    <img src=\"images/cryp_log.png\" style=\"width: 200px\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 24px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">Hello ".$name."</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style=\"background-color: #f7f8fb;\">
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: justify;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Congratulations your account has been approved and is now active. You can login to your customer portal anytime and click the “Place An Order” Tab to submit your order requests.
                                                    </p>
                                                    </br>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Should you have any further queries, feel free to email us at: compliance@smartKYC.com.
                                                    </p>
                                                    </br>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Best Regards,
                                                    </p>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        SmartKYC
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;background-color: white\">
                                                    <p style=\"text-align: center;font-size: 14px;font-family: 'Montserrat Light', sans-serif;color: #cacaca;line-height: 1.5;\">
                                                        For more details login to
                                                    </p>
                                                    <p>
                                                        <a href=".dbconfig::$emailBaseUrl." style=\"color: #fff; text-decoration: none\"> <div style=\"display: inline-block;background-color: #FFC107;font-family: 'Montserrat Light', sans-serif;padding: 7px 30px;border-radius: 20px;color: #f7f8fb;font-size: 12px;\">SMARTKYC</div></a>
                                                    </p>
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_btm_mail.png\" style=\"width: 100%\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: transparent\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;\"><span style=\"font-size: 10px;color: #999999;font-family: 'Montserrat Light', sans-serif;\">Copyright © 2017 SmartKYC.com. All Rights Reserved.</span></td>
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
                <!--[if gte mso 9]>
                </td>
                </tr>
                </table>
                <![endif]-->
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";

    }
    public static function emailContentVerificationRejected($name){

        return "<!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <base href=".dbconfig::$emailBaseUrl."/>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>SmartKYC</title>
    <!--<link href=\"https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat|Open+Sans|Raleway:300|Roboto:300\" rel=\"stylesheet\">-->
    <!--<link href=\"http://allfont.net/allfont.css?fonts=montserrat-light\" rel=\"stylesheet\" type=\"text/css\" />-->
</head>
<body style=\"width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" style=\"background-color: #f7f8fb;padding: 5% 0;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- BEGIN TEMPLATE // -->
                <!--[if gte mso 9]>
                <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"max-width:600px;\">
                    <tr>
                        <td align=\"center\" valign=\"top\" width=\"600\" style=\"width:600px;\">
                <![endif]-->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"max-width: 600px\">
                    <tbody>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;background-color: white\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;text-align: center;padding-top: 3%\">
                                            <tr>
                                                <td>
                                                    <img src=\"images/cryp_log.png\" style=\"width: 200px\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 24px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">Hello ".$name."</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style=\"background-color: #f7f8fb;\">
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Your KYC details have been rejected. You can view the details from the portal.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;background-color: white\">
                                                    <p style=\"text-align: center;font-size: 14px;font-family: 'Montserrat Light', sans-serif;color: #cacaca;line-height: 1.5;\">
                                                        For more details login to
                                                    </p>
                                                    <p>
                                                        <a href=".dbconfig::$emailBaseUrl." style=\"color: #fff; text-decoration: none\"> <div style=\"display: inline-block;background-color: #FFC107;font-family: 'Montserrat Light', sans-serif;padding: 7px 30px;border-radius: 20px;color: #f7f8fb;font-size: 12px;\">SMARTKYC</div></a>
                                                    </p>
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_btm_mail.png\" style=\"width: 100%\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: transparent\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;\"><span style=\"font-size: 10px;color: #999999;font-family: 'Montserrat Light', sans-serif;\">Copyright © 2017 SmartKYC.com. All Rights Reserved.</span></td>
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
                <!--[if gte mso 9]>
                </td>
                </tr>
                </table>
                <![endif]-->
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";
 
    }
    public static function emailContentEmailVerification($link){

        return "
        <!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <base href=".dbconfig::$emailBaseUrl."/>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>SmartKYC</title>
    <!--<link href=\"https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat|Open+Sans|Raleway:300|Roboto:300\" rel=\"stylesheet\">-->
    <!--<link href=\"http://allfont.net/allfont.css?fonts=montserrat-light\" rel=\"stylesheet\" type=\"text/css\" />-->
</head>
<body style=\"width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" style=\"background-color: #f7f8fb;padding: 5% 0;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- BEGIN TEMPLATE // -->
                <!--[if gte mso 9]>
                <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"max-width:600px;\">
                    <tr>
                        <td align=\"center\" valign=\"top\" width=\"600\" style=\"width:600px;\">
                <![endif]-->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"max-width: 600px\">
                    <tbody>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;background-color: white\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;text-align: center;padding-top: 3%\">
                                            <tr>
                                                <td>
                                                    <img src=\"images/cryp_log.png\" style=\"width: 200px\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 24px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">Hello </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style=\"background-color: #f7f8fb;\">
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Please click the button below to verify your email id.
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;background-color: white\">
                                                    <p>
                                                        <a href=".$link." style=\"color: #fff; text-decoration: none\"> <div style=\"display: inline-block;background-color: #FFC107;font-family: 'Montserrat Light', sans-serif;padding: 7px 30px;border-radius: 20px;color: #f7f8fb;font-size: 12px;\">Verify Email</div></a>
                                                    </p>
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_btm_mail.png\" style=\"width: 100%\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: transparent\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;\"><span style=\"font-size: 10px;color: #999999;font-family: 'Montserrat Light', sans-serif;\">Copyright © 2017 SmartKYC.com. All Rights Reserved.</span></td>
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
                <!--[if gte mso 9]>
                </td>
                </tr>
                </table>
                <![endif]-->
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";

    }
    public static function emailContentWelcomeMail($name){

        return "<!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <base href=".dbconfig::$emailBaseUrl."/>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>SmartKYC</title>
    <!--<link href=\"https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat|Open+Sans|Raleway:300|Roboto:300\" rel=\"stylesheet\">-->
    <!--<link href=\"http://allfont.net/allfont.css?fonts=montserrat-light\" rel=\"stylesheet\" type=\"text/css\" />-->
</head>
<body style=\"width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" style=\"background-color: #f7f8fb;padding: 5% 0;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- BEGIN TEMPLATE // -->
                <!--[if gte mso 9]>
                <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"max-width:600px;\">
                    <tr>
                        <td align=\"center\" valign=\"top\" width=\"600\" style=\"width:600px;\">
                <![endif]-->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"max-width: 600px\">
                    <tbody>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;background-color: white\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;text-align: center;padding-top: 3%\">
                                            <tr>
                                                <td>
                                                    <img src=\"images/cryp_log.png\" style=\"width: 200px\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 24px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">Hi ".$name."</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style=\"background-color: #f7f8fb;\">
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Thank you for creating an account with SmartKYC.com.
                                                    </p>
                                                    </br>
                                                    <p style=\"text-align: justify;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        As a next step, please complete our online KYC forms located in your customer portal and attach your supporting documents in order to get approved prior to placing orders with us.
                                                    </p>
                                                    </br>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Should you have any further queries, feel free to email us at: compliance@smartkyc.com.
                                                    </p>
                                                    </br>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Best Regards,
                                                    </p>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        smartkyc
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;background-color: white\">
                                                    <p style=\"text-align: center;font-size: 14px;font-family: 'Montserrat Light', sans-serif;color: #cacaca;line-height: 1.5;\">
                                                        For more details login to
                                                    </p>
                                                    <p>
                                                        <a href=".dbconfig::$emailBaseUrl." style=\"color: #fff; text-decoration: none\"> <div style=\"display: inline-block;background-color: #FFC107;font-family: 'Montserrat Light', sans-serif;padding: 7px 30px;border-radius: 20px;color: #f7f8fb;font-size: 12px;\">SMARTKYC</div></a>
                                                    </p>
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_btm_mail.png\" style=\"width: 100%\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: transparent\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;\"><span style=\"font-size: 10px;color: #999999;font-family: 'Montserrat Light', sans-serif;\">Copyright © 2017 SmartKYC.com. All Rights Reserved.</span></td>
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
                <!--[if gte mso 9]>
                </td>
                </tr>
                </table>
                <![endif]-->
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";
    }
    public static function emailContentOrderConfirm($name){

        return "<!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <base href=".dbconfig::$emailBaseUrl."/>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>SmartKYC</title>
    <!--<link href=\"https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat|Open+Sans|Raleway:300|Roboto:300\" rel=\"stylesheet\">-->
    <!--<link href=\"http://allfont.net/allfont.css?fonts=montserrat-light\" rel=\"stylesheet\" type=\"text/css\" />-->
</head>
<body style=\"width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" style=\"background-color: #f7f8fb;padding: 5% 0;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- BEGIN TEMPLATE // -->
                <!--[if gte mso 9]>
                <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"max-width:600px;\">
                    <tr>
                        <td align=\"center\" valign=\"top\" width=\"600\" style=\"width:600px;\">
                <![endif]-->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"max-width: 600px\">
                    <tbody>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;background-color: white\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;text-align: center;padding-top: 3%\">
                                            <tr>
                                                <td>
                                                    <img src=\"images/cryp_log.png\" style=\"width: 200px\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 24px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">Hi ".$name."</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style=\"background-color: #f7f8fb;\">
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: justify;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Thank you for submitting your order request with SmartKYC.com. Our team is currently reviewing your order details and will be in contact with you soon.
                                                    </p>
                                                    </br>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Should you have any further queries in the meantime feel free to email us at: orders@smartkyc.com.
                                                    </p>
                                                    </br>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        Best Regards,
                                                    </p>
                                                    <p style=\"text-align: left;font-size: 18px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;;width: 90%;margin: auto\">
                                                        SmartKYC
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;background-color: white\">
                                                    <p style=\"text-align: center;font-size: 14px;font-family: 'Montserrat Light', sans-serif;color: #cacaca;line-height: 1.5;\">
                                                        For more details login to
                                                    </p>
                                                    <p>
                                                        <a href=".dbconfig::$emailBaseUrl." style=\"color: #fff; text-decoration: none\"> <div style=\"display: inline-block;background-color: #FFC107;font-family: 'Montserrat Light', sans-serif;padding: 7px 30px;border-radius: 20px;color: #f7f8fb;font-size: 12px;\">SMARTKYC</div></a>
                                                    </p>
                                                </td>
                                                <td style=\"text-align: right;width: 40%;\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_btm_mail.png\" style=\"width: 100%\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: transparent\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;\"><span style=\"font-size: 10px;color: #999999;font-family: 'Montserrat Light', sans-serif;\">Copyright © 2017 SmartKYC.com. All Rights Reserved.</span></td>
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
                <!--[if gte mso 9]>
                </td>
                </tr>
                </table>
                <![endif]-->
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";
    }
    public static function emailContentToAdminOnOrder($name,$country,$email,$phone,$amount,$type,$message){

        return "
        <!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>SmartKYC</title>
    <!--<link href=\"https://fonts.googleapis.com/css?family=Lato:300,400|Montserrat|Open+Sans|Raleway:300|Roboto:300\" rel=\"stylesheet\">-->
    <!--<link href=\"http://allfont.net/allfont.css?fonts=montserrat-light\" rel=\"stylesheet\" type=\"text/css\" />-->
</head>
<body style=\"width:100% !important; margin:0 !important; padding:0 !important; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; background-color:#FFFFFF;\">
<center>
    <table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"100%\" width=\"100%\" style=\"background-color: #f7f8fb;padding: 5% 0;\">
        <tr>
            <td align=\"center\" valign=\"top\">
                <!-- BEGIN TEMPLATE // -->
                <!--[if gte mso 9]>
                <table align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" width=\"600\" style=\"max-width:600px;\">
                    <tr>
                        <td align=\"center\" valign=\"top\" width=\"600\" style=\"width:600px;\">
                <![endif]-->
                <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"max-width: 600px\">
                    <tbody>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;background-color: white\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"width: 100%;text-align: center;padding-top: 3%\">
                                            <tr>
                                                <td>
                                                    <img src=\"images/cryp_log.png\" style=\"width: 200px\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <p style=\"text-align: center;font-size: 24px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">Order Details</p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr style=\"background-color: #f7f8fb;\">
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white;\">
                                            <tr>
                                                <td>
                                                    <table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" width=\"90%\" style=\"margin:auto;text-align: left;background-color: white;font-size: 17px;font-family: 'Montserrat Light', sans-serif;color: #989898;line-height: 1.5;\">
                                                        <tr>
                                                            <td style=\"padding: 5px\">Name</td>
                                                            <td style=\"padding: 5px\">".$name."</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"padding: 5px\">Country</td>
                                                            <td style=\"padding: 5px\">".$country."</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"padding: 5px\">Email</td>
                                                            <td style=\"padding: 5px\">".$email."</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"padding: 5px\">Phone</td>
                                                            <td style=\"padding: 5px\">".$phone."</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"padding: 5px\">Order Amount</td>
                                                            <td style=\"padding: 5px\">".$amount."</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"padding: 5px\">Order Type</td>
                                                            <td style=\"padding: 5px\">".$type."</td>
                                                        </tr>
                                                        <tr>
                                                            <td style=\"padding: 5px\">Order Message</td>
                                                            <td style=\"padding: 5px\">".$message."</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tr>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: white;padding-top: 20px\">
                                            <tr>
                                                <td style=\"text-align: center;width: 100%;\">
                                                    <img src=\"images/cryp_btm_mail.png\" style=\"width: 100%\">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;\">
                                <tbody>
                                <tr>
                                    <td>
                                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" style=\"text-align: center;background-color: transparent\">
                                            <tbody>
                                            <tr>
                                                <td style=\"text-align: center;\"><span style=\"font-size: 10px;color: #999999;font-family: 'Montserrat Light', sans-serif;\">Copyright © 2017 SmartKYC.com. All Rights Reserved.</span></td>
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
                <!--[if gte mso 9]>
                </td>
                </tr>
                </table>
                <![endif]-->
                <!-- // END TEMPLATE -->
            </td>
        </tr>
    </table>
</center>
</body>
</html>";
    }

}

$config = new dbconfig();
$db = new DataBaseHandler();
$db->openDatabase($config);
