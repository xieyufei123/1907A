<!DOCTYPE html>
<html>
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>{{$goods->goods_name}}</title>
	  <link rel="stylesheet" href="\static\admin\css\bootstrap.min.css">
	  <script src="/static/admin/js/jquery-3.2.1.min.js"></script>

</head>
<body>
	<h3>{{$goods->goods_name}}</h3>
	<span>当前访问量:{{$current}}</span>
	<hr/>
	 <p>价格：{{$goods->goods_price}}</p>
  <p>{{$goods->goods_desc}}</p>
  <button>购买</button>
</body>
<script >
	$('button').click(function(){
		//alert(777);
		var gid={{$goods->gid}};
		$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
		
		//alert('gid'); 
		$.post('/goods/addcart',{gid:gid},function(res){
			//alert(777);
		if(res.code=='00001'){
			alert(res.msg);
			//location.href='/checklogin';
		}
			if(res.code=='00002'){
			alert(res.msg);
		}
			if(res.code=='00000'){
			alert(res.msg);
			//location.href='/goods';
		}
	},'json');
	
	});
	
</script>
</html>