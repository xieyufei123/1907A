<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h3>员工列表展示</h3>
<a href="{{url('/work/create')}}">添加</a>
<form>
    <input type="text" name="wname" value="{{$query['wname']??''}}" placeholder="请输入关键字">
    <button>搜索</button>
</form>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>员工名称</th>
                <th>员工号</th>
                <th>所属部门</th>
                <th>员工头像</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $v)
            <tr>
                <td>{{$v->wid}}</td>
                <td>{{$v->wname}}</td>
                <td>{{$v->wnum}}</td>
                <td>{{$v->class}}</td>
                <td><img src="{{env('UPLOAD_URL')}}{{$v->w_pic}}" width="50" height="50"/></td>
                <td><a href="{{url('/work/edit',$v->wid)}}" >编辑</a>
                    <a href="{{url('/work/destroy',$v->wid)}}">删除</a>
                </td>
            </tr>
           @endforeach
        <tr>
            <td colspan="4">{{$data->appends($query)->links()}}</td>
        </tr>
        </tbody>
    </table>
</body>
</html>
</body>
</html>