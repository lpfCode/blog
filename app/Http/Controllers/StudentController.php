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
    public function index(){
        $st = Student::all();
        return View::make('students.show')->with('studentInfo',$st);
    }
    public function create(){
        return view('students.add');
    }
    public function store(Request $request){
//        $st = new Student();
        $student =[
            'name'=>$request->input('name'),
            'age' =>$request->input('age'),
            'obj' =>$request->input('obj'),
            'score'=>$request->input('score')
        ];
//        $st->insert($student);
        StudentService::getInstance()->addByArray($student);
        Session::flash('message','add successful');
        return Redirect::to('st');
    }
    public function edit(Request $request){
        $id = $request->input('id');
        $st = StudentService::getInstance()->selectByParam(id,$id);
//        $st = Student::find($id);
        return View::make('students.edit')->with('studentInfo',$st);
    }
    public function update(Request $request){
        $id = $request->input('id');
        $st = Student::find($id);
        $st->name = $request->input('name');
        $st->age =  $request->input('age');
        $st->obj = $request->input('obj');
        $st->score = $request->input('score');
//        $st->save();
        StudentService::getInstance()->addByModel($st);
        Session::flash('message','update successful');
        return Redirect::to('st');
    }
    public function detroy(Request $request){
        $id = $request->input('id');
//        $st = Student::find($id);
//        $st->delete();
        StudentService::getInstance()->modifyByParam(id,$id);
        Session::flash('message','delete successsful');
        return Redirect::to('st');
    }
}
