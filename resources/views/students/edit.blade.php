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
            <a class="navbar-brand" href="{{ URL::to('st') }}">首页</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('st') }}">更多</a></li>
            <li><a href="{{ URL::to('st/create') }}">添加</a>
        </ul>
    </nav>
    <h1>编辑: {{ $studentInfo->name }}</h1>
    <table class="table table-striped table-bordered">
        <form method="post" action="/blog/update">
            {{csrf_field()}}
            <tr>
                <td>姓名：</td>
                <input style="display: none" type="text" name="id" value="{{ $studentInfo->id }}">
                <td><input type="text" name="name" value="{{ $studentInfo->name }}"></td>
            </tr>
            <tr>
                <td>年龄：</td>
                <td><input type="text" name="age" value="{{ $studentInfo->age }}"></td>
            </tr>
            <tr>
                <td>科目：</td>
                <td>
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