<!DOCTYPE html>
<html>
<head>
    <title>看这里:编辑</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('st') }}">首页</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('st') }}">更多</a></li>
            <li><a href="{{ URL::to('st/create') }}">添加</a>
        </ul>
    </nav>
    <h1>编辑: {{ $blog->name }}</h1>
    <table class="table table-striped table-bordered">
        <form method="post" action="/blog/update">
            {{csrf_field()}}
            <tr>
                <td>用户名称：</td>
                <input style="display: none" type="text" name="id" value="{{ $blog->id }}">
                <td><input type="text" name="name" value="{{ $blog->name }}"></td>
            </tr>
            <tr>
                <td>用户邮箱：</td>
                <td><input type="text" name="email" value="{{ $blog->email }}"></td>
            </tr>
            <tr>
                <td>博客等级：</td>
                <td>
                    <select name="blog_level">
                        {{--  有@标识符之后，就会用PHP解释器解析@if和@endif之间的代码就不用加{{}}  --}}
                        <option value="1" @if($blog->blog_level ==1) selected @endif>1</option>
                        <option value="2" @if($blog->blog_level ==2) selected @endif>2</option>
                        <option value="3" @if($blog->blog_level ==3) selected @endif>3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="提交">
                </td>
            </tr>
        </form>
    </table>
</div>
</body>
</html>