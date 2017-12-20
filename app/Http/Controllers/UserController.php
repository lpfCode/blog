<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/12/20
 * Time: 上午10:42
 */

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller{
    public $name = '';
    public $pass = '';
    public function __construct(Request $request){

        $this->name = $request->input('name');
        $this->pass = $request->input('pass');
    }
    public function login(Request $request){

        $count = UserService::getInstance()->findUserByNP($this->name,$this->pass);
        if($count>0){
            $_SESSION['name'] = $this->name;
            return view('welcome');
        }else{
            Session::flash('message','用户名或密码错误');
        }
    }
    public function reg(){

        return view('user.reg');
    }
    public function jyUser(){
        $count = UserService::getInstance()->findUserByName($this->name);
        if($count!=0){
            return response()->json(array(
                'msg' => "用户名已被注册"
            ));
        }else{
            return response()->json(array(
                'msg' => "用户名正确"
            ));
        }
    }
    public function saveUser(Request $request){
        $arr = [
            'name' => $this->name,
            'pass' => $this->pass
        ];
        UserService::getInstance()->insertUser($arr);
        Session::flash('message','注册成功可以登陆啦！');
        return view('user.log');
    }
}