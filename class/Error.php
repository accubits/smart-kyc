<?php
/**
 * Created by PhpStorm.
 * User: Jibin Mathew
 * Date: 10/31/15
 * Time: 6:54 PM
 */

class Error {
    public $responseCode = 400;
    public $string;
    public function internalServer(){
        http_response_code(500);
        $r['success'] = false;
        $r['error'] = 'Internal server error';
        echo json_encode($r);
        die();
    }
    public function errorHandler(){
        http_response_code($this->responseCode);
        $r['success'] = false;
        $r['error'] = $this->string;
        echo json_encode($r);
        die();
    }
}