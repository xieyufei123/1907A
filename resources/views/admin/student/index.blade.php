<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css"> 
</head>
<body>
<h3>学生列表</h3>
<a href="{{url('/student/create')}}">添加</a>
<table class="table">
  <thead>
    <tr>
      <th>学生ID</th>
      <th>学生名称</th>
      <th>学生性别</th>
      <th>班级</th>
      <th>操作</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($data as $v)
    <tr>
      <td>{{$v->student_id}}</td>
      <td>{{$v->student_name}}</td>
      <td>{{$v->student_sex}}</td>
      <td>{{$v->class}}</td>
      <td><a href="{{url('/student/edit/'.$v->student_id)}}"  class="btn btn-info">编辑</a>|<a href="{{url('/student/destroy/'.$v->student_id)}}" class="btn btn-danger">删除</a></td>
    </tr>
   @endforeach
  
  <tr>
  	<td colspan="4"> {{ $data->links() }}</td>
  </tr>
  
</tbody>
</table>
</body>
</html>