<?php

namespace App\Service;
use App\Models\Article;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class StudentService{

//    全局变量的定义(不用在每一个类中都new一下，减少内存开销的同时，减少代码量)，但是一般用单例模式的形式来处理
//     public function __construct(){
//
//         $this->_stuModel = new Student();
//     }
//     单例模式定义开始
     private static $_instance = null;
     private function __construct(){
     }
     public static  function getInstance(){
         if(self::$_instance===null){
             self::$_instance = new self();
         }
         return self::$_instance;
     }
//     单例模式定义结束
//     根据字段查询多条记录
     public function selectByParam($param,$value){

//         return $this->_stuModel->findByParam($param,$value);
         return Student::getInstance()->findByParam($param,$value);
     }
//     根据字段查询一条记录
     public function selectOneByParam($param,$value){

//         return $this->_stuModel->findByParam($param,$value);
         return Student::getInstance()->findOneByParam($param,$value);
     }
//     存储 数组格式
     public function addByArray($array){

//         $this->_stuModel->saveByArray($array);
          Student::getInstance()->saveByArray($array);
     }
//     更新 Model格式
     public function modifyByModel(Student $student){

//         $this->_stuModel->saveByModel($student);
          Student::getInstance()->updateByModel($student);
     }
//     按照字段删除记录
     public function deleteByParam($param,$value){
         //要删除关联表需要使用事务
         DB::beginTransaction();
         $result = Student::getInstance()->removeByParam($param,$value);
         echo '1';
         if(!$result){
             DB::rollBack();
         }else{
             $res = Article::getInstance()->deleteByStId($value);
             echo '2';
             if(!$res){
                 DB::rollBack();
             }
         }
         DB::commit();
     }
//     查询所有
     public function selectAll(){
         return Student::getInstance()->findAll();
     }
//     查询每个学生阅读的文章数量
     public function selectByStId(){

         $stId = Student::getInstance()->findId();
         $arr = array();
//         echo count($stId)."<br>";
//         echo json_decode($stId[0])->id;
         for($i=0;$i<count($stId);$i++){
             $count = Article::getInstance()->findArticleByStId(json_decode($stId[$i])->id);
             Student::getInstance()->updatetById(json_decode($stId[$i])->id,$count);
             array_push($arr,$count);
         }
         return $arr;
     }
}
