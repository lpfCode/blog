<?php

namespace App\Service;
use App\Models\Student;

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
//     根据字段查询记录
     public function selectByParam($param,$value){

//         return $this->_stuModel->findByParam($param,$value);
         return Student::getInstance()->findByParam($param,$value);
     }
//     单例模式定义结束
//     根据字段查询记录
     public function selectOneByParam($param,$value){

//         return $this->_stuModel->findByParam($param,$value);
         return Student::getInstance()->findOneByParam($param,$value);
     }
//     存储 数组格式
     public function addByArray($array){

//         $this->_stuModel->saveByArray($array);
          Student::getInstance()->saveByArray($array);
     }
//     跟新 Model格式
     public function modifyByModel(Student $student){

//         $this->_stuModel->saveByModel($student);
          Student::getInstance()->updateByModel($student);
     }
//     按照字段删除记录
     public function deleteByParam($param,$value){

         Student::getInstance()->removeByParam($param,$value);
     }
}