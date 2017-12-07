<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

define('TOKEN','weixin');

class WelcomeController extends Controller{

    public function index(Request $request){

        if($_GET['echostr']) {
            file_put_contents('/tmp/a.txt', $_GET['echostr'] . "\n", FILE_APPEND);
            echo $_GET['echostr'];
        }
        return view("welcome");
    }
}
