<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/12/19
 * Time: 下午2:51
 */

namespace App\Service;


use App\Models\Article;

class ArticleService{

    //单例模式开始
    private static $_instance = null;
    private function __construct(){}
    public static function getInstance(){
        if(self::$_instance===null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    //单例模式结束
    //按照stId删除
    public function removeByStId(){
        Article::getInstance()->deleteByStId();
    }
}