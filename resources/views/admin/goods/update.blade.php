<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<h3>品牌添加</h3>
<!-- @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
       @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
       @endforeach
     </ul>
   </div>
    @endif --> 
	<form class="form-horizontal" role="form"action="{{url('goods/update')}}" method="post" enctype="multipart/form-data">
  <div class="form-group" >
  	@csrf
    <label for="firstname" class="col-sm-2 control-label">商品名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="goods_name" placeholder="请输入名字"  value="{{$data->goods_name}}">
      <b style="color:red">{{$errors->first('goods_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品价格</label>

    <div class="col-sm-10">
      <input type="text" class="form-control"  name="goods_price" placeholder="请输入价格"  value="{{$data->goods_price}}">
        <b style="color:red">{{$errors->first('goods_price')}}</b>
    </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">商品图片</label>
    <div class="col-sm-10">
      <input type="file" class="form-control"  name="goods_img">
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">所属分类</label>
    <div class="col-sm-10">
     <select name="cid">
     	<option value="">--请选择--</option>
     	 @foreach ($data as $k => $v)
   	            	<option value="{{$v -> cid}}">{{$v -> cname}}</option>
   	       @endforeach
     </select>
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">所属品牌</label>
    <div class="col-sm-10">
     <select name="bid">
     	<option value="">--请选择--</option>
     	 @foreach ($data as $k => $v)
   	            	<option value="{{$v -> bid}}">{{$v -> bname}}</option>
   	     @endforeach
     </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">修改</button>
    </div>
  </div>
</form>
</body>
</html>