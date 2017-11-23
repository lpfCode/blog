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
     public function selectByParam($param,$value){

//         return $this->_stuModel->findByParam($param,$value);
         return Student::getInstance()->findByParam($param,$value);
     }
     public function addByArray($array){

//         $this->_stuModel->saveByArray($array);
         return Student::getInstance()->saveByArray($array);
     }
     public function addByModel(Student $student){

//         $this->_stuModel->saveByModel($student);
         return Student::getInstance()->saveByModel();
     }
     public function modifyByParam($param,$value){

//         $this->_stuModel->removeByParam($param,$value);
         return Student::getInstance()->removeByParam($param,$value);
     }
}