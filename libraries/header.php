<?php

/**
 * Created by PhpStorm.
 * User: Jibin Mathew
 * Date: 9/28/15
 * Time: 5:26 PM
 */

session_start();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'NvooyUtils.php';
include '../config/config.php';
include '../libraries/RedisSession.php';

header('Content-Type: application/json');
/*
$http_origin = $_SERVER['HTTP_ORIGIN'];
if ($http_origin == "http://www.disign.co" || $http_origin == "http://disign.co"){
    header("Access-Control-Allow-Origin: $http_origin");
}*/
header("access-control-allow-origin: *");

function onEmptyHandler() {

    http_response_code(400);
    $result['status'] = false;
    $result['error'] = "Try again with appropriate parameters";
    echo json_encode($result);
    die();
}
function onNotSetHandler() {

    http_response_code(400);
    $result['status'] = false;
    $result['error'] = "Try again with appropriate parameters";
    echo json_encode($result);
    die();
}

function model_loader($className){
    if(file_exists('../models/'.$className.'.php')){
        include '../models/'.$className.'.php';
    }
}
function class_loader($className){
    if(file_exists('../class/'.$className.'.php')){
        include '../class/'.$className.'.php';
    }
}


spl_autoload_register("model_loader");
spl_autoload_register("class_loader");

$error  = new Error();
$redis = new RedisSession($config->REDIS_HOST, $config->REDIS_PORT, $config->REDIS_EXPIRY);

