<?php
/**
 * Created by PhpStorm.
 * User: accubits
 * Date: 30/08/17
 * Time: 11:29 AM
 */

include '../libraries/header.php';
include '../class/Authenticate.php';

function onSuccessHandler() {

    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $users->setEmail($_POST[$config->COL_userRegistration_email]);
    
    $response=$users->forgotPassword();
    echo json_encode($response);

}


$required = array(
    $config->COL_userRegistration_email
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);