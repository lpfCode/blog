<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Service\BlogService;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class BlogController extends Controller{

    public function index(){
        //查询所有
        $blogs = Blog::all();
        return View::make('blogs.index')->with('blogs', $blogs);
    }

    public function create(){
        //添加
        return View::make('blogs.create');
    }

    public function store(Request $request){
        //表单提交（添加）
            // store
        $db = new Blog();
        $blog = [
            'name'  => $request->input('name'),
            'email'  => $request->input('email'),
            'blog_level'  => $request->input('blog_level'),
        ];
        $db->save($blog);
        return Redirect::to('/blog');
    }

    public function edit(Request $request){
        $id = $request->input('id');
        $blog = Blog::find($id);
        return View::make('blogs.edit')->with('blog',$blog);
    }

    public function update(Request $request){
        //表单提交（编辑）
            // store
            $id = $request->input('id');
            $blog = Blog::find($id);
            $blog->name       = $request->input('name');
            $blog->email      = $request->input('email');
            $blog->blog_level = $request->input('blog_level');
            $blog->save();

            // redirect
            return Route::redirect('/blog');
//            return Redirect::to('blog');
    }

    public function destroy($id){
        //删除
        BlogService::deleteById($id);
        return Redirect::to('blog');
    }
}
