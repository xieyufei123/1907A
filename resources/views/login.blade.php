<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form action="{{url('/dologin')}}" method="post">
		@csrf
		用户名：<input type="text" name="name"><br>
		密码：<input type="password" name="password"><br>
		<input type="submit" value="提交">
	</form>
</body>
</html>