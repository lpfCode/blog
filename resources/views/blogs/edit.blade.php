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
            <a class="navbar-brand" href="{{ URL::to('blog') }}">首页</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('blog') }}">更多</a></li>
            <li><a href="{{ URL::to('blog/create') }}">添加</a>
        </ul>
    </nav>
    <h1>编辑: {{ $blog->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ HTML::ul($errors->all()) }}

    {{ Form::model($blog, array('route' => array('blogs.update', $blog->id), 'method' => 'POST')) }}

    <div class="form-group">
        {{ Form::label('name', '用户名称') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', '用户邮箱') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('blog_level', '博客等级') }}
        {{ Form::select('blog_level', array('0' => '选择', '1' => '1', '2' => '2', '3' => '3'), null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('提交', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>