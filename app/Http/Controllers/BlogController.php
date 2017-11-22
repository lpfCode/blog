<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use App\Service\BlogService;
use Illuminate\Http\Request;
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

        $blog = [
            'name'  => $request->input('name'),
            'email'  => $request->input('email'),
            'blog_level'  => $request->input('blog_level'),
        ];
        Blog::save($blog);
        dd($blog);
        return Redirect::to('/blog');
    }

    public function edit(Request $request){
        $id = $request->input('id');
        //编辑
//        $blog = BlogService::getById($id);
        $blog = Blog::find($id);
        return View::make('blogs.edit')->with('blog',$blog);
    }

    public function update($id){
        //表单提交（编辑）
            // store
            $blog = Blog::find($id);
            $blog->name       = Input::get('name');
            $blog->email      = Input::get('email');
            $blog->blog_level = Input::get('blog_level');
            $blog->save();

            // redirect
            return Redirect::to('blog');
    }

    public function destroy($id){
        //删除
        BlogService::deleteById($id);
        return Redirect::to('blog');
    }
}
