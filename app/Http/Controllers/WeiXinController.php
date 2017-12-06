<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/12/5
 * Time: 下午4:17
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WeiXinController extends Controller{


    public function index(Request $request){

        echo "public Hello wx";
        $data = print_r($_REQUEST, true);
        file_put_contents('/tmp/a.txt', $data . "\n", FILE_APPEND);
        $signature = $request->get('signature');
        $timestamp = $request->get('timestamp');
        $nonce = $request->get('nonce');
        $token = 'weixin';
        $my_signature = array($token,$timestamp,$nonce);
        sort($my_signature,SORT_STRING);
        $my_signature = implode($my_signature);
        $my_signature = sha1($my_signature);
        if($my_signature != $signature){
            return -1;
        }else{
            return $signature;
        }
    }

    public function api(){

        echo "ssss000000";
        return view('wx.index');
    }

}
//http://118.89.227.17/wx&callback_token=weixin&encoding_aeskey=VGuuX9slAYZkPdT9QMhOO4hqvuPzImGLQlHGHwjtQ1q&callback_encrypt_mode=0&operation_seq=433218347