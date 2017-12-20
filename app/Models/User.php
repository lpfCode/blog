<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/12/20
 * Time: 上午10:56
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model {

    /*单例模式开始*/
    private static $_instance = null;
    public static function getInstance(){
        if(self::$_instance===null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /*单例模式结束*/

    //根据用户名和密码查询用户是否在
    public function selectUserByNP($name,$pass){
        return $this->where([['name',$name],['pass',$pass]])->count();
    }
    //查询用户名是否重复
    public function selectUserByName($name){
        return $this->where('name',$name)->count();
    }
    //添加用户
    public function insert($arr){
        $this->insert($arr);
    }
}