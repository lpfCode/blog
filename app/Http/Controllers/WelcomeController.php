<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class WelcomeController extends Controller{

    public function __construct(){

        $_SERVER['REMOTE_ADDR'];
        $_SERVER['QUERY_STRING'];
        echo "Hello wx";
    }

    public function index(Request $request){

            echo "Hello wx";
            $data = print_r($_REQUEST, true);
            file_put_contents('/tmp/a.txt', $data . "\n", FILE_APPEND);
            $signature = $request->get('signature');
            $timestamp = $request->get('timestamp');
            $nonce = $request->get('nonce');
            $token = 'weixin';
            $my_signature = array($token, $timestamp, $nonce);
            sort($my_signature, SORT_STRING);
            $my_signature = implode($my_signature);
            $my_signature = sha1($my_signature);
            if ($my_signature != $signature) {
                return -1;
            } else {
                return $signature;
            }

//        return view('welcome');
    }
}
