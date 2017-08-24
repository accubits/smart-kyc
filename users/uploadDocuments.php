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
    $users->setImage($users->uploadImage($_FILES));
    print_r($users->getImage());
    foreach ($users->getImage() as $image)
    {
        $response = $users->insertImage();
    }
}
$required = array(
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);