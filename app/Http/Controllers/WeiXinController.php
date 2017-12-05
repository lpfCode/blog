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

    public function __construct(){
        print_r($_GET['echostr']);
    }

    public function index(Request $request){

        if($request->get('echostr')==null){
            return -1;
        }else{
            return $request->get('echostr');
        }
    }

    public function api(){

        echo "ssss000000";
        return view('wx.index');
    }

}