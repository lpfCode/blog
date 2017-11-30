<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/11/27
 * Time: 下午5:05
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class File extends Model{

    protected $table = 'files';
    /*定义单例开始*/
    private static $_instance = null;
    public static function getInstance(){
        if(self::$_instance===null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /*单例定义结束*/
    //插入操作
    public function insertByArr($array){
        $this->insert($array);
    }
    //更新操作
    public function updateByModel(File $model){

        $model->save();
    }
    //查找 by stId
    public function selectByStId($value){

       return $this->where('stId',$value)->first();
    }
}