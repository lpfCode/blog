<!DOCTYPE html>
<html>
<head>
    <title>数据库基本操作</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div align="right">
            @if (Session::get('name')!==null) 用户名：{{Session::get('name')}};@endif
        </div>
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('st') }}">首页</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('st') }}">更多</a></li>
                <li><a href="{{ URL::to('st/create') }}">重填</a>
            </ul>
        </nav>
        <h1>添加学生信息</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <table class="table table-striped table-bordered">
            <form method="post" action="/st/store">
                {{ csrf_field() }}
                <tr>
                    <td>姓名：</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>年龄：</td>
                    <td><input type="text" name="age"></td>
                </tr>
                <tr>
                    <td>科目：</td>
                    <td>
                        <select name="obj">
                            <option value="语文">语文</option>
                            <option value="数学">数学</option>
                            <option value="英语">英语</option>
                            <option value="计算机组成原理">计算机组成原理</option>
                            <option value="计算机网络">计算机网络</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>成绩：</td>
                    <td><input type="text" name="score"></td>
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