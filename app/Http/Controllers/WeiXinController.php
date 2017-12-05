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

//    public function __construct(){
//
//        $this->middleware('WeiXin');
//    }

    public function index(){

//        return Input::get('echostr');
//        $wx = Input::get('echostr');
////        return view('wx.index');
//        return View::make('wx.index')->with('weixinInfo', $wx);
        $echoStr = $_GET["echostr"];
        if($this->checkSignature()){
            echo $echoStr;
            exit;
        }
    }
    //检查签名
    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = "202910";
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if($tmpStr == $signature){
            return true;

        }else{
            return false;
        }
        return View::make('wx.index')->with('weixinInfo', $signature);
    }

    public function api(){

        echo "ssss000000";
        return view('wx.index');
    }

}