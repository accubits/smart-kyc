<?php
/**
 * Created by PhpStorm.
 * User: maria
 * Date: 24/8/17
 * Time: 6:41 PM
 */

include '../libraries/header.php';
include '../class/Authenticate.php';

function onSuccessHandler()
{
    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $users->setUniqueId($_POST[$config->COL_usersImage_userRegistration_unique_id]);
    $users->setImage($users->uploadImage($_FILES));
    $images = $users->getImage();
    $out = $users->addAllImage($images);
    $data = $users->getUserDetailsFromId($_POST[$config->COL_usersImage_userRegistration_unique_id]);
    $email = $data[$config->COL_userRegistration_email];
    $users->sendMail($email,"Confirmation Email of KYC Documents",dbconfig::emailContentUploadSuccesfull($data[$config->COL_users_first_name]));
//    $users->sendMail('dittops@accubits.com',"KYC uploaded","User ".$_POST[$config->COL_usersImage_users_unique_id]."
//     uploaded KYC details");
    $users->sendMail(dbconfig::$adminMail,"KYC uploaded","User ".$_POST[$config->COL_usersImage_userRegistration_unique_id]."
     uploaded KYC details");
    echo json_encode($out);
    
}
$required = array(
    $config->COL_usersImage_userRegistration_unique_id
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);