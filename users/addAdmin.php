<?php
/**
 * Created by PhpStorm.
 * User: maria
 * Date: 29/8/17
 * Time: 12:04 PM
 */

include '../libraries/header.php';
include '../class/Authenticate.php';

function onSuccessHandler() {

    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $users->setUserName($_POST[$config->COL_userRegistration_username]);
    $users->setEmail($_POST[$config->COL_userRegistration_email]);
    $users->setPassword($_POST[$config->COL_userRegistration_password]);
    $users->setStatus("1");

    $response=$users->addAdmin();
    echo json_encode($response);


}


$required = array(
    $config->COL_userRegistration_username,
    $config->COL_userRegistration_email,
    $config->COL_userRegistration_password
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);