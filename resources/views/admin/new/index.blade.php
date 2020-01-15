<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
</head>
<body>
<h3>学生列表</h3>
<form>
  新闻名称：<input type="text" name="nname" value="{{$query['nname']??''}}" placeholder="请输入新闻名称的关键字">
  <input type="submit" value="搜索">
</form>
<a href="{{url('/new/create')}}">添加</a>
<table class="table">
  <thead>
    <tr>
      <th>新闻ID</th>
      <th>新闻标题</th>
      <th>作者</th>
      <th>所属类型</th>
      <th>添加时间</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($data as $v)
    <tr>
      <td>{{$v->nid}}</td>
      <td>{{$v->nname}}</td>
      <td>{{$v->nman}}</td>

      <td>{{$v->fid}}</td>
      <td>{{date('Y-m-d H:i:s',$v->ctime)}}</td>
    </tr>
   @endforeach
  
 
  
</tbody>
</table>
 <td colspan="5">{{$data->appends($query)->links()}}</td>
</body>
</html>