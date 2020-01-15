<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
	<form>
		<input type="text" name="title"><input type="submit" value="搜索">
	</form>
	<a href="{{url('/article/create')}}">添加</a>
	<table border="1">
		<tr>
			<td>编号</td>
			<td>文章标题</td>
			<td>文章分类</td>
			<td>文章图片</td>
			<td>文章的重要性</td>
			<td>是否显示</td>
			<td>添加日期</td>
			<td>操作</td>
		</tr>
		@foreach ($data as $v)
		<tr>
			<td>{{$v->article_id}}</td>
			<td>{{$v->title}}</td>
			<td>{{$v->class}}</td>
			<td><img src="{{env('UPLOAD_URL')}}{{$v->a_img}}" width="50px" height="50px"></td>
			<td>{{$v->danxuan}}</td>
			<td>{{$v->is_show}}</td>
			<td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
			<td><a href="{{url('/article/edit',$v->article_id)}}">编辑</a>
                   <a onclick="ajaxdel({{$v->article_id}})" href="javascript:void(0)">删除</a></td>
		</tr>
		@endforeach
	  {{$data->appends($query)->links()}}
	</table>
</body>
<script src="/static/admin/js/jquery-3.2.1.min.js"></script>
<script>
	//删除
	//function ajaxdel(id){
		//删除的第一种
// 		$.ajaxSetup({
// 		headers: {
// 		 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  }
// });

// 			$.ajax({
// 			type: "POST",
// 			url: "/article/del/"+id,
// 			data: "",
// 			dataType:'json',
// 			}).done(function(res){
// 			if(res.code=='00000'){
// 				alert(res.msg);
// 				location.reload();
// 			}
// 			 }); 
// 	}		 
// 			 第二种删除的方法

			  function   ajaxdel(id){
		  	if(!id){
		  		return;
		  	}
		  	$.get('/article/del/'+id,function(res){
		  		if(res.code=='00000'){
				alert(res.msg);
				location.reload();
		}
		  	},'json');
		  }

</script>
</html>
