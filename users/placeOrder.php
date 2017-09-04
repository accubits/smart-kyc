<?php
/**
 * Created by PhpStorm.
 * User: accubits
 * Date: 04/09/17
 * Time: 2:40 PM
 */

include '../libraries/header.php';

function onSuccessHandler()
{

    global $config,$db,$error;
    $order = new Order($db,$config,$error);
    $order->setUserUnique($_POST[$config->COL_order_user_uniqueId]);
    $order->setName($_POST[$config->COL_order_name]);
    $order->setCountry($_POST[$config->COL_order_country]);
    $order->setEmail($_POST[$config->COL_order_email]);
    $order->setPhone($_POST[$config->COL_order_phone]);
    $order->setAmount($_POST[$config->COL_order_amount]);
    $order->setType($_POST[$config->COL_order_type]);
    $order->setMessage($_POST[$config->COL_order_message]);
    $out    = $order->addOrder();
    echo json_encode($out);

}

$required = array(
    $config->COL_order_user_uniqueId,
    $config->COL_order_name         ,
    $config->COL_order_country ,
    $config->COL_order_email        ,
    $config->COL_order_phone        ,
    $config->COL_order_amount    ,
    $config->COL_order_type         ,
    $config->COL_order_message      ,
);

NvooyUtils::onSetAndEmptyCheckHandler($_POST, $required, $required, "onSuccessHandler", "onEmptyHandler", "onNotSetHandler", true);