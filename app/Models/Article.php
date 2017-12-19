<?php
/**
 * Created by PhpStorm.
 * User: yonghu
 * Date: 2017/12/19
 * Time: 下午2:45
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;

class Article extends Model {

    protected $table = "articles";

    //单例模式开始
    private static $_instance = null;
    public static function getInstance(){
        if(self::$_instance===null){
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    //单例模式结束
    public function findArticleByStId($stId){

        Redis::set('$stid',$this->where('stId',$stId)->count());
    }
}