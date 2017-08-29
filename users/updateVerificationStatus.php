<?php
/**
 * Created by PhpStorm.
 * User: accubits
 * Date: 29/08/17
 * Time: 11:20 PM
 */

include '../libraries/header.php';
include '../class/Authenticate.php';

function onSuccessHandler()
{

    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $users->setRegistrationId($_POST[$config->COL_users_userRegistration_unique_id]);
    if ($_POST['status'] !=1 && $_POST['status']!= 0){
        $error->responseCode = 400;
        $error->string = "Invalid status";
        $error->errorHandler();
    }
    echo json_encode($users->updateVerificationStatus($_POST['status']));

}

$required = array(
    $config->COL_users_userRegistration_unique_id,
    'status'
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);