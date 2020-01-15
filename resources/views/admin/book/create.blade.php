<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>添加页面</h3>
    <form action="{{url('/book/store')}}" method="post" enctype="multipart/form-data">
        @csrf
    图书名字：<input type="text" name="bname"><br>
    <b style="color:red">{{$errors->first('bname')}}</b>
    作者：<input type="text" name="man"><br>
        <b style="color:red">{{$errors->first('man')}}</b>
    图书价格：<input type="text" name="price"><br>
    图书封面：<input type="file" name="face"><br>
    <input type="submit" value="添加">
    </form>
</body>
</html>
