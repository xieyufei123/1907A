<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h3>添加页面</h3>
	<form action="{{url('sale/store')}}" method="post" enctype="multipart/form-data">
		@csrf
	<table>
		<tr>
			<td>小区名</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>地理位置</td>
			<td><input type="text" name="location"></td>
		</tr>
		<tr>
			<td>面积</td>
			<td><input type="text" name="square"></td>
		</tr>
		<tr>
			<td>导购员</td>
			<td><input type="text" name="saleman"></td>
		</tr>
		<tr>
			<td>联系的电话</td>
			<td><input type="tel" name="tel"></td>
		</tr>
		<tr>
			<td>楼盘主图</td>
			<td><input type="file" name="img"></td>
		</tr>
		<tr>
			<td>楼盘相册</td>
			<td><input type="file" name="imgs"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value="添加"></td>
		</tr>
	</table>
</form>
</body>
</html>