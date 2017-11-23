<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Service\StudentService;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    //查寻全部
    public function index(){
        $st = Student::all();
        return View::make('students.show')->with('studentInfo',$st);
    }
    //新增跳转
    public function create(){
        return view('students.add');
    }
    //添加表单提交
    public function store(Request $request){
        $student =[
            'name'=>$request->input('name'),
            'age' =>$request->input('age'),
            'obj' =>$request->input('obj'),
            'score'=>$request->input('score')
        ];
        StudentService::getInstance()->addByArray($student);
        Session::flash('message','add successful');
        return Redirect::to('st');
    }
    //编辑跳转回显
    public function edit(Request $request){
        $id = $request->input('id');
        $st = StudentService::getInstance()->selectByParam('id',$id);
        return View::make('students.edit')->with('studentInfo',$st);
    }
    //更新表单提交
    public function update(Request $request){
        $id = $request->input('id');
        $st = Student::find($id);
        $st->name = $request->input('name');
        $st->age =  $request->input('age');
        $st->obj = $request->input('obj');
        $st->score = $request->input('score');
        StudentService::getInstance()->modifyByModel($st);
        Session::flash('message','update successful');
        return Redirect::to('st');
    }
    //删除
    public function destroy(Request $request){
        $id = $request->input('id');
        StudentService::getInstance()->deleteByParam('id',$id);
        Session::flash('message','delete successsful');
        return Redirect::to('st');
    }
    //条件查询
    public function tjcx(Request $request){
        $param = $request->input('key');
        $value = $request->input('value');
        $result = StudentService::getInstance()->selectByParam('name',$value);
        var_dump($result);
//        return View::make('students.show')->with('studentInfo',$result);
//        return View::make(students.show)->with('studentInfo',$result)->with('key',$param)->with('value',$value);
    }
}
