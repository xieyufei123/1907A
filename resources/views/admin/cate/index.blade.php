<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="\static\admin\css\bootstrap.min.css">
</head>
<body>
<h3>分类展示</h3>
<a href="{{url('/cate/create')}}">添加</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>分类名称</th>
                <th>父级</th>
                <th>是否显示</th>
                <th>是否在导航栏显示</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $v)
            <tr>
                <td>{{$v->cate_id}}</td>
                <td>{{$v->cate_name}}</td>
                <td>{{$v->parent_id}}</td>
                <td>@if($v->is_show==1)√@else × @endif</td>
                <td>{{$v->is_nav_show==1?'√':'×'}}</td>
                <td><a href="{{url('/cate/edit',$v->cate_id)}}" class="btn btn-info">编辑</a>
                    <a href="{{url('/cate/destroy',$v->cate_id)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
           @endforeach

        </tbody>
    </table>
</body>
</html>
