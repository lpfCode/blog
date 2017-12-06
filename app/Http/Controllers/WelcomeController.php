<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

define('TOKEN','weixin');

class WelcomeController extends Controller{

//    public function __construct(Request $request){
//
//            $signature = $request->get('signature');
//            $timestamp = $request->get('timestamp');
//            $nonce = $request->get('nonce');
//            $token = 'weixin';
//            $my_signature = array($token, $timestamp, $nonce);
//            sort($my_signature, SORT_STRING);
//            $my_signature = implode($my_signature);
//            $my_signature = sha1($my_signature);
//            if ($my_signature != $signature) {
//                return -1;
//            } else {
//                return 1;
//            }
//    }
    public function index(){

        $signature = $_GET['signature'];
        $nonce = $_GET['nonce'];
        $timestamp = $_GET['timestamp'];
        $tmpArr = array($timestamp,$nonce,TOKEN);
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if($tmpStr == $signature) {
            $echostr = $_GET['echostr'];
            if($echostr) {
                echo $echostr;
                exit;
            }
        }
//<!--            $data = print_r($_REQUEST, true);-->
//<!--            file_put_contents('/tmp/a.txt', $data . "\n", FILE_APPEND);-->
//<!--            if(empty($_REQUEST)){-->
//<!--                return -1;-->
//<!--            }else{-->
//<!--                return $_REQUEST['echostr'];-->
//<!--            }-->
//        return view('welcome');
    }
}
