<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/12/20
 * Time: 上午11:09
 */

namespace App\Service;


use App\Models\User;

class UserService{

    /*单例模式开始*/
    private static $_instance = null;
    private function __construct(){}
    public static function getInstance(){
        if(self::$_instance===null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /*单例模式解释*/

    //根据用户名密码查用户
    public function findUserByNP($name,$pass){
        return User::getInstance()->selectUserByNP($name,$pass);
    }
    //根据用户名查用户
    public function findUserByName($name){
        return User::getInstance()->selectUserByName($name);
    }
    //增加用户
    public function insertUser($arr){
        return User::getInstance()->insertByArr($arr);
    }
}