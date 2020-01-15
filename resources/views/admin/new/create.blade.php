<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
		<h3>添加页面</h3>
		 <form action="{{url('/new/store')}}" method="post" enctype="multipart/form-data">
        @csrf
    新闻名字：<input type="text" name="nname"><br>
    <b style="color:red">{{$errors->first('nname')}}</b>
    记者：<input type="text" name="nman"><br>
        <b style="color:red">{{$errors->first('nman')}}</b>
   所属类型：<select>
   	            <option>请选择</option>
   	            @<?php foreach ($data as $k => $v): ?>
   	            	<option value="{{$v -> fid}}">{{$v -> fname}}</option>
   	            <?php endforeach ?>
   			</select>
    <input type="submit" value="添加">
    </form>
</body>
</html>