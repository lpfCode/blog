<?php

namespace App\Http\Controllers;


class WelcomeController extends Controller{

    public function index(){
        //首页
        return view('welcome');
    }
}
