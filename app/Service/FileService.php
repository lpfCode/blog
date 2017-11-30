<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/11/28
 * Time: 上午10:50
 */

namespace App\Service;


use App\Models\File;

class FileService{

    /*定义单例模式开始*/
    private static $_instance = null;
    public function __construct(){
    }
    public static function getInstance(){
        if(self::$_instance===null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    /*定义单例模式结束*/
    //插入操作
    public function saveByArr($array){
        File::getInstance()->insertByArr($array);
    }
    //更新操作by Model
    public function modifyByModel(File $model){

        File::getInstance()->updateByModel($model);
    }
    //查找 by stId
    public function findByStId($value){
        File::getInstance()->selectByStId($value);
    }
}