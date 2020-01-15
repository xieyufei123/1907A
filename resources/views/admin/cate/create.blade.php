<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<title></title>
<link rel="stylesheet" href="/static/admin/css/bootstrap.min.css">
	<script src="/static/admin/js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<h3>分类添加</h3>
<!-- @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
       @foreach ($errors->all() as $error)
     <li>{{ $error }}</li>
       @endforeach
     </ul>
   </div>
    @endif  -->
	<form class="form-horizontal" role="form"action="{{url('/cate/store')}}" method="post" enctype="multipart/form-data">
  <div class="form-group" >
  	@csrf
    <label for="firstname" class="col-sm-2 control-label">分类名称</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="cate_name" placeholder="请输入名字">
      <b style="color:red">{{$errors->first('cate_name')}}</b>
    </div>
  </div>
  <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">父极分类</label>

    <div class="col-sm-10">
        <select name="parent_id" class="form-control">
            <option value="0">请选择父极分类</option>
            @foreach($data as $v)
            <option value="{{$v->cate_id}}">{{str_repeat('|-',$v->level)}}{{$v->cate_name}}</option>
                @endforeach
        </select>
    </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否显示</label>
    <div class="col-sm-10">
      <input type="radio"  name="is_show" value="1" checked="checked">是
        <input type="radio"  name="is_show" value="2">否
    </div>
  </div>
   <div class="form-group">
    <label for="lastname" class="col-sm-2 control-label">是否导航栏显示</label>
    <div class="col-sm-10">
        <input type="radio"  name="is_nav_show" value="1" >是
        <input type="radio"  name="is_nav_show" value="2" checked="checked">否
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">添加</button>
    </div>
  </div>
</form>
</body>
</html>
