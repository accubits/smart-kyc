<?php
/**
 * Created by PhpStorm.
 * User: maria
 * Date: 29/8/17
 * Time: 8:50 PM
 */

include '../libraries/header.php';
include '../class/Authenticate.php';

function onSuccessHandler()
{

    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $users->setUniqueId($_POST[$config->COL_userRegistration_unique_id]);
    echo json_encode($users->readDetails());

}

$required = array(
    $config->COL_userRegistration_unique_id
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);