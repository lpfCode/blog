<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/12/5
 * Time: 下午4:17
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class WeiXinController extends Controller{

    public function index(){

        return view('wx.index');
    }
    public function api(){

        echo "ssss000000";
        return view('wx.index');
    }
}