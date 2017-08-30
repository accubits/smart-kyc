<?php
/**
 * Created by PhpStorm.
 * User: accubits
 * Date: 30/08/17
 * Time: 11:55 AM
 */

include '../libraries/header.php';

function onSuccessHandler() {

    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $users->setPassword($_POST[$config->COL_userRegistration_password]);
    $users->setRegistrationId($_POST[$config->COL_users_userRegistration_unique_id]);

    $response=$users->updatePassword($_POST['oldPassword']);
    echo json_encode($response);

}

$required = array(
    $config->COL_users_userRegistration_unique_id,
    $config->COL_userRegistration_password,
    'oldPassword'
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);