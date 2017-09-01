<?php
/**
 * Created by PhpStorm.
 * User: accubits
 * Date: 01/09/17
 * Time: 6:42 PM
 */

include '../libraries/header.php';

function onSuccessHandler()
{

    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $users->setRegistrationId($_POST[$config->COL_users_userRegistration_unique_id]);
    $users->setMobileNumber($_POST[$config->COL_users_mobile_number]);
    $users->setEmail($_POST[$config->COL_userRegistration_email]);
    $out = $users->updateUserDetails();

    echo json_encode($out);

}

$required = array(
    $config->COL_users_userRegistration_unique_id,
    $config->COL_users_mobile_number,
    $config->COL_userRegistration_email
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);