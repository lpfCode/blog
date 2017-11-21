<!DOCTYPE html>
<html>
<head>
    <title>看这里：增</title>
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
    <h1>添加博客</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::open(array('url' => 'blog')) }}
    <div class="form-group">
        {{ Form::label('name', '名字') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', '邮箱') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('blog_level', '博客等级') }}
        {{ Form::select('blog_level', array('0' => '选择', '1' => '1', '2' => '2', '3' => '3'), Input::old('blog_level'), array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('提交', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>