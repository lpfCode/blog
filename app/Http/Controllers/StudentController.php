<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Service\StudentService;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentController extends Controller
{
    //查寻全部
    public function index(){
//        $st = Student::all();
//        $st = new Student();
//        $st->orderBy('id','desc')->get();
        $st = Student::paginate(6);
        return View::make('students.show')->with('data',['info'=>$st,'key'=>null,'value'=>null]);
    }
    //新增跳转
    public function create(){
        return view('students.add');
    }
    //添加表单提交
    public function store(Request $request){

        $this->validate($request,[
            'name'       => 'required',
            'obj'      => 'required',
            'age' => 'required',
            'score' => 'required'
            ]);
        $student =[
            'name'=>$request->input('name'),
            'age' =>$request->input('age'),
            'obj' =>$request->input('obj'),
            'score'=>$request->input('score')
        ];
        StudentService::getInstance()->addByArray($student);
        Session::flash('message','添加成功');
        return Redirect::to('st');
    }
    //编辑跳转回显
    public function edit(Request $request){
        $id = $request->input('id');
        $st = StudentService::getInstance()->selectOneByParam('id',$id);
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
        Session::flash('message','更新成功');
        return Redirect::to('st');
    }
    //删除
    public function destroy(Request $request){
        $id = $request->input('id');
        StudentService::getInstance()->deleteByParam('id',$id);
        Session::flash('message','删除成功');
        return Redirect::to('st');
    }
    //条件查询
    public function tjcx(Request $request){
        $param = $request->input('key');
        $value = $request->input('value');
        if($value==null){
            Session::flash('message','请填入要查询的值');
            return Redirect::to('st');
        }else{
            if($param=='name'){
                $result = StudentService::getInstance()->selectByParam('name',$value);
            }elseif ($param=='obj'){
                $result = StudentService::getInstance()->selectByParam('obj',$value);
            }elseif ($param=='age'){
                $result = StudentService::getInstance()->selectByParam('age',$value);
            }else{
                $result = StudentService::getInstance()->selectByParam('score',$value);
            }
        }
//        var_dump($result);
        if($result==null){
            Session::flash('message','查询的内容为空');
            return Redirect::to('st');
        }else{
            return View::make('students.show')->with('data', ['info'=>$result, 'key'=>$param, 'value'=>$value]);
        }
//        return View::make(students.show)->with('studentInfo',$result);
    }
}
