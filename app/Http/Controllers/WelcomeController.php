<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

define('TOKEN','weixin');

class WelcomeController extends Controller{

    public function index(){
         if(1===2){//将网址粘贴进来以后判断SESSION是否存在如果存在跳转到首页
             return view("welcome");
         }else{//如果不存在跳转到登陆页
             return view("user.login");
         }
    }
}
