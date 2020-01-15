<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8"> 
	<title></title>
<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">     
	
</head>
<body>
	<h3>学生编辑</h3><hr/>
	<form class="form-horizontal" role="form" action="{{url('/student/update/'.$data->student_id)}}" method="post">
  <div class="form-group" >
  	@csrf
    <label for="firstname" class="col-sm-2 control-label">学生名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname" name="student_name"  value="{{$data->student_name}}" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">学生性别</label>
    <div class="col-sm-10">
      <input type="radio" id="lastname" name="student_sex" value="男">男
       <input type="radio"  id="lastname" name="student_sex" value="女">女
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">班级</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="class" value="{{$data->class}}">
    </div>
  </div>
   
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10"> 
      <button type="submit" class="btn btn-default">编辑</button>
    </div>
  </div>
</form>
</body>
</html>