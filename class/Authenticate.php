<?php

/**
 * Created by PhpStorm.
 * User: reshman
 * Date: 28/2/17
 * Time: 3:10 PM
 */


class Authenticate
{
    private $redisHost;
    private $redisPort;
    private $redisTime;

    public function __construct($redisHost, $redisPort, $redisTime) {
        $this->redisHost = $redisHost;
        $this->redisPort = $redisPort;
        $this->redisTime = $redisTime;
    }

    public function getRedisConnection(){
        $redis = new RedisSession($this->redisHost,$this->redisPort,$this->redisTime);
        return $redis;
    }
    public function getAuthenticate($redis){
        $redis->key = isset($_POST['token'])?$_POST['token']:'';
        $data = $redis->getSessionValue();
        return $data;
    }

}



$authenticate = new Authenticate($config->REDIS_HOST, $config->REDIS_PORT, $config->REDIS_EXPIRY);
$redis        = $authenticate->getRedisConnection();

global $redisData;

$redisData = $authenticate->getAuthenticate($redis);

if (empty($redisData)) {
    if (!isset($_POST['token'])) {
        return;
    }
    $error = new Error();
    $error->responseCode = 403;
    $error->string = "Invalid token";
    $error->errorHandler();
}