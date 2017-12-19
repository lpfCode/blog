<!DOCTYPE html>
<html>
<head>
    <title>登陆页面</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="col-md-offset-3 col-md-6" style="width: 50%;height: 50%">
            <form class="form-horizontal" action="/user/login" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="用户名">
                </div>
                <div class="form-group help">
                    <input type="password" class="form-control" id="pass" name="pass" placeholder="密　码">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">登录</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>