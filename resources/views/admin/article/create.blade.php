<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h3>添加页面</h3>
	<form action="{{url('article/store')}}" method="post" enctype="multipart/form-data">
		@csrf
		文章标题<input type="text" name="title"><br>
		<b style="color:red">{{$errors->first('title')}}</b>
		文章分类<select name="class">
			<option>小说</option>
			<option>名著</option>
			<option>古诗</option>
		</select><br>
		文章重要性<input type="radio" value="普通" name="danxuan" checked>普通
		<input type="radio"  name="danxuan" value="置顶">置顶<br>
		是否显示<input type="radio"  name="is_show" value="显示" checked>显示
		<input type="radio"  name="is_show" value="不显示">不显示<br>
		文章作者<input type="text" name="man"><br>
		作者email<input type="text" name="a_email"><br>
		关键字<input type="text" name="guanjianzi"><br>
		网页描述<textarea name="desc"></textarea><br>
		上传文件<input type="file" name="a_img"><br>
		<input type="submit" value="确定">
		<input type="reset" value="重置">
		
	</form>
</body>
</html>