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
    <form>
        <input type="text" name="bname"  value="{{$query['bname']??''}}" placeholder="请输入你要搜索的图书名字">
        <input type="submit" value="提交">
    </form>
 <table border="1">
     <tr>
         <td>图书名</td>
         <td>作者</td>
         <td>价格</td>
         <td>封面</td>
     </tr>
     @foreach ($data as $v)
     <tr>
         <td>{{$v->id}}</td>
         <td>{{$v->bname}}</td>
         <td>{{$v->price}}</td>
         <td><img src="{{env('UPLOAD_URL')}}{{$v->face}}" height="100"></td>
     </tr>
         @endforeach
     {{$data->appends($query)->links()}}

 </table>
</body>
</html>
