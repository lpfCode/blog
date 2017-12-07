<!DOCTYPE html>
<html>
<head>
    <title>我的代码</title>
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
    <h1>所有代码 </h1>
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    {{--<div>--}}
        {{--<form method="get" action="/st/tjcx">--}}
            {{--{{ csrf_field() }}--}}
            {{--<tr>--}}
                {{--<td>关键字：--}}
                    {{--<select name="key">--}}
                        {{--<option value="name" @if($data['key']=='name') selected @endif>姓名</option>--}}
                        {{--<option value="age" @if($data['key']=='age') selected @endif>年龄</option>--}}
                        {{--<option value="obj" @if($data['key']=='obj') selected @endif>科目</option>--}}
                        {{--<option value="score" @if($data['key']=='score') selected @endif>分数</option>--}}
                    {{--</select>--}}
                {{--</td>--}}
                {{--<td><input type="text" name="value" value="{{$data['value']}}"></td>--}}
                {{--<td><input type="submit" value="检索"></td>--}}
            {{--</tr>--}}
        {{--</form>--}}
    {{--</div>--}}
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>方法名</td>
            <td>操作</td>
        </tr>
        </thead>
        <tbody>
        {{--@foreach($data['info'] as $key => $value)--}}
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->pro}}</td>
                <td>
                    {{--<a class="btn btn-small btn-success" href="/st/destroy?id={{ $value->id }}">删除</a>--}}
                    <a class="btn btn-small btn-info" href="/code/muliArray">运行</a>
                </td>
            </tr>
        {{--@endforeach--}}
        </tbody>
    </table>
    {{--<div align="right"><tr>{{$data['info']->links()}}</tr></div>--}}
</div>
</body>
</html>