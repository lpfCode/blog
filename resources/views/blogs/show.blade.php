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
            <a class="navbar-brand" href="{{ URL::to('blog') }}">首页</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('blog') }}">更多</a></li>
            <li><a href="{{ URL::to('blog/create') }}">添加</a>
        </ul>
    </nav>
    <h1>详细: {{ $blog->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $blog->name }}</h2>
        <p>
            <strong>用户邮箱:</strong> {{ $blog->email }}<br>
            <strong>博客等级:</strong> {{ $blog->blog_level }}
        </p>
    </div>
</div>
</body>
</html>