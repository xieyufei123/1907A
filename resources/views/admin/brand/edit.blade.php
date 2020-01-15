<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8"> 
	<title></title>
<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">     
	
</head>
<body>
	<h3>品牌修改</h3><hr/>
	<form class="form-horizontal" role="form" action="{{url('/brand/update/'.$data->brand_id)}}" method="post">
  <div class="form-group" >
  	@csrf
    <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="firstname" name="brand_name" value="{{$data->brand_name}}" placeholder="请输入名字">
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌网址</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="lastname" name="brand_url" placeholder="请输入姓" value="{{$data->brand_url}}">
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌logo</label>
    <div class="col-sm-10">
      <input type="file" class="form-control" id="lastname" name="brand_logo">
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">品牌描述</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="lastname" placeholder="请输入姓" name="brand_desc" value="{{$data->brand_desc}}"></textarea>	
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