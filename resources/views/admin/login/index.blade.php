<!DOCTYPE html>
<html>
<head>
	<title>登录页面</title>
</head>
<body>
      			<b style="color: red">{{session('msg')}}</b>
      <form action="{{url('login/do')}}" method="post">
      	@csrf
      	<table border="3">
      		<tr>
      			<td>用户名</td>
      			<td><input type="text" name="user_name"></td>
      	    </tr>
      	    <tr>
      			<td>用户密码</td>
      			<td><input type="password" name="pwd"></td>
      	    </tr>
      	    <tr>
      			<td></td>
      			<td><input type="submit" value="添加"></td>
      	    </tr>
      	</table>
      </form>
</body>
</html>