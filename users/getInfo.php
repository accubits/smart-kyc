<?php
/**
 * Created by PhpStorm.
 * User: maria
 * Date: 28/8/17
 * Time: 6:12 PM
 */


include '../libraries/header.php';
include '../class/Authenticate.php';

function onSuccessHandler()
{

    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $users->setRegistrationId($_POST[$config->COL_users_userRegistration_unique_id]);
    echo json_encode($users->readInfo());

}

$required = array(
    $config->COL_users_userRegistration_unique_id
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);