<?php

namespace Core;

class Core{
    static $response;
    static $status;
    static $data;
    static $code;
    static $error;

    public static function setResponse($response){
        self::$response = array(
            'status' => $response['status'] ?? 'success',
            'msg' => $response['msg'] ?? null,
            'code' => self::$code ?? 200,
            'error' => self::$error ?? null,
            'data' => $response['data'] ?? null
        );
    }
}