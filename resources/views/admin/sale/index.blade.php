<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form>
		<h3>展示</h3>
<a href="{{url('/sale/create')}}">添加</a>
		<table border="1">
			<tr>
				<td>ID</td>
				<td>小区名</td>
				<td>地理位置</td>
				<td>面积</td>
				<td>导购员</td>
				<td>联系电话</td>
				<td>楼盘主图</td>
				<td>楼盘相册</td>
				<td>操作</td>

			</tr>
			@foreach ($data as $v)
			<tr>
				<td>{{$v->id}}</td>
				<td><a href="{{url('sale/xiangqing',$v->id)}}">{{$v->name}}</a></td>
				<td>{{$v->location}}</td>
				<td>{{$v->square}}</td>
				<td>{{$v->saleman}}</td>
				<td>{{$v->tel}}</td>
				<td><img src="{{env('UPLOAD_URL')}}{{$v->img}}" width="50" height="50"></td>
				<td><img src="{{env('UPLOAD_URL')}}{{$v->imgs}}" width="50" height="50"></td>
				<td><a onclick="ajaxdel({{$v->id}})" href="javascript:void(0)">删除</a></td>

			</tr>
			@endforeach
		</table>
	</form>
</body>
<script src="/static/admin/js/jquery-3.2.1.min.js"></script>
<script>
   function   ajaxdel(id){
      if(!id){ return;   }
         
  $.get('/sale/del/'+id,function(res){
          if(res.code=='00000'){
                alert(res.msg);
                location.reload();
        }
            },'json');
          }

</script>
</html>