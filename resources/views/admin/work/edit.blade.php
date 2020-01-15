<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h3>编辑页面</h3>
	<form action="{{url('/work/update/'.$data->wid)}}" method="post" enctype="multipart/form-data">
	员工姓名<input type="text" name="wname" value="{{$data->wname}}"><br>
	员工号<input type="tel" name="wnum" value="{{$data->wnum}}"><br>
	所属部门<select name="class" value="{{$data->class}}">
		<option>生产部</option>
		<option>市场部</option>
		<option>营销部</option>
		<option>人事部</option>
	</select>
	员工头像<input type="file" name="w_pic" value="{{$data->w_pic}}"><br>
	<input type="submit" value="提交">
</form>
</body>
</html>