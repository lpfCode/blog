<!DOCTYPE html>
<html>
<head>
    <title>数据库的基本操作</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript">
        function deleteById(stId) {
            flag = confirm("是否要删除这条数据？");
            if(flag){
                $.ajax({
                    type:'get',
                    url:'/st/destroy?id='+stId,
                    success:function (data) {
                        $("#tr"+stId).hide();
                        $("#tr"+stId).remove();
                    }
                });
            }
        }
    </script>
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
        <div>
            <form method="get" action="/st/tjcx">
                {{ csrf_field() }}
                <tr>
                    <td>关键字：
                        <select name="key">
                            <option value="name" @if($data['key']=='name') selected @endif>姓名</option>
                            <option value="age" @if($data['key']=='age') selected @endif>年龄</option>
                            <option value="obj" @if($data['key']=='obj') selected @endif>科目</option>
                            <option value="score" @if($data['key']=='score') selected @endif>分数</option>
                        </select>
                    </td>
                    <td><input type="text" name="value" value="{{$data['value']}}"></td>
                    <td><input type="submit" value="检索"></td>
                </tr>
            </form>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>姓名</td>
                    <td>年龄</td>
                    <td>科目</td>
                    <td>成绩</td>
                    <td>阅读文章数量</td>
                    <td align="center">操作</td>
                </tr>
            </thead>
            <tbody>
                @foreach($data['info'] as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->age }}</td>
                        <td>{{ $value->obj}}</td>
                        <td>{{ $value->score }}</td>
                        <td>12</td>
                        <td align="center">
                            {{--<a class="btn btn-small btn-success" href="/st/destroy?id={{ $value->id }}">删除</a>--}}
                            <a class="btn btn-small btn-success" href="javascript:void(0)" onclick="deleteById({{$value->id}})">删除</a>
                            <a class="btn btn-small btn-info" href="/st/edit?id={{ $value->id }}">编辑</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{--<div align="right"><tr>{{$data['info']->links()}}</tr></div>--}}
    </div>
</body>
</html>