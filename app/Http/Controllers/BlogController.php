<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

class BlogController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //查询所有
        $blogs = Blog::all();
        return View::make('blogs.index')->with('blogs', $blogs);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //添加
        return View::make('blogs.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(){
        //表单提交（添加）
        //validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'blog_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('blog/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $blog = new Nerd;
            $blog->name       = Input::get('name');
            $blog->email      = Input::get('email');
            $blog->blog_level = Input::get('blog_level');
            $blog->save();

            // redirect
            Session::flash('message', '添加成功');
            return Redirect::to('blog');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //显示详细
        $blog = Blog::find($id);
        return View::make('blogs.show')
            ->with('blog', $blog);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //编辑
        $blog = Blog::find($id);
        return View::make('blogs.edit')->with('blog',$blog);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //表单提交（编辑）
        $rules = array(
            'name'       => 'required',
            'email'      => 'required|email',
            'blog_level' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('blog/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $blog = Nerd::find($id);
            $blog->name       = Input::get('name');
            $blog->email      = Input::get('email');
            $blog->blog_level = Input::get('blog_level');
            $blog->save();

            // redirect
            Session::flash('message', '更新成功');
            return Redirect::to('blog');
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        //删除
        $blog = Blog::find(id);
        $blog->delete();
        Session::flash('message', '删除成功');
        return Redirect::to('blog');
    }
}
