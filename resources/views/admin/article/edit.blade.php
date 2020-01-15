<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h3>编辑页面</h3>
	<form action="{{url('/article/update/'.$data->article_id)}}" method="post" enctype="multicle/form-data">
		@csrf
		文章标题<input type="text" name="title" value="{{$data->title}}"><br>
		<b style="color:red">{{$errors->first('title')}}</b>
		文章分类<select name="class" value="{{$data->class}}">
			<option>小说</option>
			<option>名著</option>
			<option>古诗</option>
		</select><br>
		文章重要性<input type="radio" value="普通" name="danxuan">普通
		<input type="radio"  name="danxuan" value="置顶">置顶<br>
		是否显示<input type="radio"  name="is_show" value="显示" >显示
		<input type="radio"  name="is_show" value="不显示">不显示<br>
		文章作者<input type="text" name="man" value="{{$data->man}}"><br>
		作者email<input type="text" name="a_email" value="{{$data->a_email}}"><br>
		关键字<input type="text" name="guanjianzi" value="{{$data->guanjianzi}}"><br>
		网页描述<textarea name="desc" value="{{$data->desc}}"></textarea><br>
		上传文件<input type="file" name="a_img"><br>
		<input type="submit" value="确定">
		<input type="reset" value="重置">
		
	</form>
</body>
</html>