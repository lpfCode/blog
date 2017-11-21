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
    <table border="1" style="width: 100%;height: 600px">
        <form method="post" action="/blog/update/{{ $blog->id }}">
            <tr>
                <td>用户名称：</td>
                <td><input type="text" name="name" value="{{ $blog->name }}"></td>>
            </tr>
            <tr>
                <td>用户邮箱：</td>
                <td><input type="text" name="email" value="{{ $blog->email }}"></td>
            </tr>
            <tr>
                <td>博客等级：</td>
                <td>
                    <select name="blog_level">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="提交">
                </td>
            </tr>
        </form>
    </table>
</div>
</body>
</html>