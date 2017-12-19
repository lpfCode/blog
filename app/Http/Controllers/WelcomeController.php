<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

define('TOKEN','weixin');

class WelcomeController extends Controller{

    public function index(Request $request){

        return view("welcome");
    }
}
