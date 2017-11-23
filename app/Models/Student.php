<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Student extends Model{

    protected $table = 'students';

//    定义单例模式开始
/*  定义单例模式使在另外一个类中可以通过单例来调用本类的方法 */
    private static $_instance = null;
    public static function getInstance(){
        if(self::$_instance === null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
//    定义单例模式结束
//    根据字段查询记录
    public function findByParam($param,$value){

        $result = $this->where($param,$value);
        return $result;
    }
//    保存 数组格式
    public function saveByArray($array){

        $this->insert($array);
    }
//    更新 Model格式
    public function updateByModel(Student $model){

        $model->save();
    }
//    根据字段删除记录
    public function removeByParam($param,$value){

        $this->where($param,$value)->delete();
    }
}
