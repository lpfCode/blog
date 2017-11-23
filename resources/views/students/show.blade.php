<!DOCTYPE html>
<html>
<head>
    <title>数据库的基本操作</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('/') }}">首页</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('st') }}">更多</a></li>
                <li><a href="{{ URL::to('st/create') }}">添加</a>
            </ul>
        </nav>
        <h1>所有数据</h1>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>姓名</td>
                    <td>年龄</td>
                    <td>科目</td>
                    <td>成绩</td>
                    <td>操作</td>
                </tr>
            </thead>
            <tbody>
                @foreach($studentInfo as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->age }}</td>
                        <td>{{ $value->obj}}</td>
                        <td>{{ $value->score }}</td>
                        <td>
                            <a class="btn btn-small btn-success" href="/st/destroy?id={{ $value->id }}">删除</a>
                            <a class="btn btn-small btn-info" href="/st/edit?id={{ $value->id }}">编辑</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>