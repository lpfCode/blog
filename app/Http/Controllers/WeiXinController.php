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

        $this->middleware('WeiXin');
    }

    public function index(){

        return Input::get('echostr');
        $wx = Input::get('echostr');
//        return view('wx.index');
        return View::make('wx.index')->with('weixinInfo', $wx);
    }
    public function api(){

        echo "ssss000000";
        return view('wx.index');
    }
}