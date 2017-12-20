<!DOCTYPE html>
<html>
<head>
    <title>注册页面</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <<script src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
           $("#name").blur(function () {
              $.ajax({
                  type:'get',
                  url:'/user/jyUser',
                  data:{name:$(this).val()},
                  dataType:'json',
                  success:function (data) {
                      $("#errorName").html(data.msg);
                  }
              });
           });
           $("#repass").blur(function () {
              var pass =  $("*[name='pass']").val();
              var repass = $(this).val();
              if(repass!=pass){
                  $("#errorRepass").html("两次输入的密码不一致");
              }else{
                  $("#errorRepass").html("密码正确");
              }
           });
        });
    </script>
    <script type="text/javascript">
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        function reg() {
            flag = confirm("是否确认要提交？");
            var name = $("*[name='name']").val();
            var pass = $("*[name='pass']").val();
            var repass = $("*[name='repass']").val();
            if(name!=''&&pass!=''&&pass===repass){
                $.ajax({
                    type:'post',
                    url:'/user/saveUser',
                    data:{name:name,pass:pass},
                    dataType:'json'
                });
            }
        }
    </script>
</head>
<style>
    body{
        margin-left: auto;
        margin-right: auto;
        margin-top: 100px;
    }
</style>
<body>
    <div class="container">
        <div class="col-md-offset-3 col-md-6" style="width: 50%;height: 50%">
            <form class="form-horizontal" id="regForm">
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input id="name" type="text" name="name" class="form-control" placeholder="用户名" aria-describedby="basic-addon1">
                </div>
                <div id="errorName" style="color:red;display:inline;"></div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input id="pass" type="password" name="pass" class="form-control" placeholder="密码" aria-describedby="basic-addon1">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">@</span>
                    <input id="repass" type="password" name="repass" class="form-control" placeholder="确认密码" aria-describedby="basic-addon1">
                </div>
                <div id="errorRepass" style="color:red;display:inline;"></div>
                <br>
                <div class="form-group" align="center">
                    <button class="btn btn-default" onclick="reg()">提交</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>