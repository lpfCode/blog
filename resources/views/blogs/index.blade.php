<!DOCTYPE html>
<html>
<head>
    <title>看这里:查</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('/') }}">首页</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('blog') }}">更多</a></li>
            <li><a href="{{ URL::to('blog/create') }}">添加</a>
        </ul>
    </nav>
    <h1>博客列表</h1>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>用户名</td>
            <td>用户邮箱</td>
            <td>博客等级</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->blog_level }}</td>
                <td>
                    <a class="btn btn-small btn-success" href="/blog/destroy?id={{$blog->id}}">删除</a>
                    <a class="btn btn-small btn-info" href="/blog/edit?id={{$blog->id}}">编辑</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>