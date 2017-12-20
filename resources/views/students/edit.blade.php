<!DOCTYPE html>
<html>
<head>
    <title>看这里:编辑</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/ajaxfileupload.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
        $(document).ready(function(){
            $("#img").change(function(){
                var data = new FormData();
                $.each($('#img')[0].files, function(i, file) {//i表示张数从0开始
                    data.append('img'+i, file);
                 });
                var id = $("*[name='id']").val();
                alert(id);
                $.ajax({
                    type:'POST',
                    url:'/file/imgadd?id='+id,
                    data:data,
                    dataType:'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        alert(data.msg);
                    },
                    error:function(xhr,type){
                        alert('上传成功');
                    }
                });
            });
        });
    </script>
</head>
<body>
<div class="container">
    <div align="right">
        <?php if(isset($_SESSION['name'])){
            echo '用户名：'.$_SESSION['name'];
        }?>
    </div>
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('st') }}">首页</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('st') }}">更多</a></li>
            <li><a href="{{ URL::to('st/create') }}">添加</a>
        </ul>
    </nav>
    <h1>编辑: {{ $studentInfo->name }}</h1>
    <table class="table table-striped table-bordered">
        <form name ="form" method="post" action="/st/update">
            {{csrf_field()}}
            <tr>
                <td>姓名：</td>
                <input style="display: none" type="text" name="id" value="{{ $studentInfo->id }}">
                <td><input type="text" name="name" value="{{ $studentInfo->name }}"></td>
                {{--<input style="display: none" id="img" name="img" type="file" class="inputFile" />--}}
                {{--<td>头像上传：<img style="height: 25px;width: 25px" src="../img/img.jpg" alt="点击添加头像" onclick="imgAdd({{$studentInfo->id}})"></td>--}}
                <td><a href="javascript:void(0);" class="file">选择图片
                        <input type="file" multiple="multiple" id="img" name="" class="photo"></a></td>
                <td><img id="img1" style="height: 80px;width: 80px" src=""></td>
            </tr>
            <tr>
                <td>年龄：</td>
                <td colspan="3"><input type="text" name="age" value="{{ $studentInfo->age }}"></td>
            </tr>
            <tr>
                <td>科目：</td>
                <td colspan="3">
                    <select name="obj">
                        {{--  有@标识符之后，就会用PHP解释器解析@if和@endif之间的代码就不用加{{}}  --}}
                        <option value="语文" @if($studentInfo->obj =='语文') selected @endif>语文</option>
                        <option value="数学" @if($studentInfo->obj =='数学') selected @endif>数学</option>
                        <option value="英语" @if($studentInfo->obj =='英语') selected @endif>英语</option>
                        <option value="计算机组成原理" @if($studentInfo->obj =='计算机组成原理') selected @endif>计算机组成原理</option>
                        <option value="计算机网络" @if($studentInfo->obj =='计算机网络') selected @endif>计算机网络</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>成绩：</td>
                <td><input type="text" name="score" value="{{$studentInfo->score}}"></td>
                <td>成绩单上传：<img style="height: 25px;width: 25px" src="../img/file.jpg" onclick="fileup({{$studentInfo->id}})"></td>
                <input style="display: none" name="file" type="file" class="inputFile">
                <td><img style="height: 80px;width: 80px" src=""></td>
            </tr>
            <tr>
                <td colspan="4">
                    <input type="submit" value="提交">
                </td>
            </tr>
        </form>
    </table>
</div>
</body>
</html>
