<?php
/**
 * Created by PhpStorm.
 * User: Reshman
 * Date: 27/02/17
 * Time: 02:30 PM
 */
include  'ISession.class.php';

class RedisSession implements ISession {

    public $key;
    private $redis;
    public $expire;
    function __construct($host,$port,$expire = 0) {
        $this->redis = new Redis();
        $this->redis->connect($host, $port);
        if(is_numeric($expire)){
            $this->expire = $expire;
        }else{
            $this->expire = 0;
        }
    }
    public function setSessionValue($data) {
        if(!is_null($this->key)){
            $result = $this->redis->set($this->key,serialize($data));
            $this->redis->persist($this->key);
            $this->extendTtl();
            return $result;
        }else{
            return false;
        }
    }
    public function getSessionValue() {
        if(!is_null($this->key)){
            $this->extendTtl();
            return unserialize($this->redis->get($this->key));
        }else{
            return false;
        }
    }
    public function extendTtl() {
        if($this->expire != 0){
            if(!is_null($this->key)){
                if($this->redis->expire($this->key,$this->expire)){
                    return true;
                }else{
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    public function destroySession() {
        if(!is_null($this->key)){
            if($this->redis->del($this->key)){
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }
}