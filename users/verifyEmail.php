<?php
/**
 * Created by PhpStorm.
 * User: accubits
 * Date: 09/09/17
 * Time: 5:31 PM
 */

include '../libraries/header.php';

function onSuccessHandler() {

    global $config,$db,$error,$redis;
    $users = new Users($db,$config,$error,$redis);
    $response=$users->verifyEmail($_GET['token']);
    
    if ($response['success'] ==true) {
        echo "Your email-id has been verified";
    }
//    echo json_encode($response);

}


$required = array(
    'token'
);

NvooyUtils::onSetAndEmptyCheckHandler($_GET, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);