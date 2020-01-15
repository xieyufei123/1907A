<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
            <tr>
                <td>小区名</td>
                <td><input type="text" name="name" value="{{$data->name}}"></td>
            </tr>
            <tr>
                <td>地理位置</td>
                <td><input type="text" name="location" value="{{$data->location}}"></td>
            </tr>
            <tr>
                <td>面积</td>
                <td><input type="text" name="square" value="{{$data->square}}"></td>
            </tr>
            <tr>
                <td>导购员</td>
                <td><input type="text" name="saleman" value="{{$data->saleman}}"></td>
            </tr>
            <tr>
                <td>联系电话</td>
                <td><input type="text" name="tel" value="{{$data->tel}}"></td>
            </tr>
             <tr>
                <td>图片</td>
                <td><img src="{{env('UPLOAD_URL')}}{{$data->img}}" width="50" height="50"></td>
            </tr>
        </table>
        <input type="submit" value="提交">
</body>
</html>