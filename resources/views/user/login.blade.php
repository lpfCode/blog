<!DOCTYPE html>
<html>
<head>
    <title>登陆页面</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<style>
    body{
        margin-left: auto;
        margin-right: auto;
        margin-top: 100px;
        /*width: 20em;*/
    }
</style>
<body>
    <div class="container">
        <div class="col-md-offset-3 col-md-6" style="width: 50%;height: 50%">
            <h3>新用户请点击<a href="/user/reg"><button class="btn btn-default">注册</button></a></h3>
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <form class="form-horizontal" action="/user/login" method="post">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input id="name" type="text" name="name" class="form-control" placeholder="用户名" aria-describedby="basic-addon1">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input id="pass" type="password" name="pass" class="form-control" placeholder="密码" aria-describedby="basic-addon1">
                </div>
                <div class="form-group" align="center">
                    <button type="submit" class="btn btn-default">登录</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>