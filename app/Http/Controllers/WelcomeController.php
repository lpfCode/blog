<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class WelcomeController extends Controller{

    public function index(){
         if(Session::get['name']!= null){
             return view("welcome");
         }else{//如果不存在跳转到登陆页
             return view("user.login");
         }
    }
}
