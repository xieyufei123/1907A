<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="\static\admin\css\bootstrap.min.css">
</head>
<body>
<h3>商品展示</h3>
<h3>欢迎 【{{session('admin')['user_name']}}】登录，<a href="{{'checklogin'}}">退出</a></h3>
<form>
    <input type="text" name="goods_name" value="{{$query['goods_name']??''}}" placeholder="请输入商品的关键字">
    <input type="text" name="goods_price">
    <input type="submit" value="提交">
</form>
<a href="{{url('/goods/create')}}">添加</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>商品名称</th>
                <th>商品图片</th>
                <th>商品价格</th>
                <th>添加时间</th>
                <th>商品品牌</th>
                <th>商品分类</th>
                 <th>操作</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $v)
             <tr>
                <td>{{$v->gid}}</td>
                <td>{{$v->goods_name}}</td>
                <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="50" height="50"></td>
                <td>{{$v->goods_price}}</td>
                <td>{{date('Y-m-d H:i:s',$v->add_time)}}</td>
                <td>{{$v->brand_name}}</td>
                <td>{{$v->cate_name}}</td>
                <td><a href="{{url('/goods/edit',$v->gid)}}" class="btn btn-info">编辑</a>
                  <a href="{{url('/goods/show',$v->gid)}}"class="btn btn-info">预览</a>
                      <a onclick="ajaxdel({{$v->gid}})" href="javascript:void(0)" class="btn btn-danger">删除</a>

                </td>
            </tr>
           @endforeach
            <tr>
            <td colspan="4">{{$data->appends($query)->links()}}</td>
        </tr>
        </tbody>
    </table>
</body>
</html>
<script src="/static/admin/js/jquery-3.2.1.min.js"></script>
<script>
   $(document).on('click','.pagination a',function(){
        var url = $(this).attr('href');
       // alert('url');die;
        $.get(url,function(res){
            $('body').html(res);
        });
        return false;
    });
   function   ajaxdel(id){
      if(!id){ return;   }
         
  $.get('/goods/del/'+id,function(res){
          if(res.code=='00000'){
                alert(res.msg);
                location.reload();
        }
            },'json');
          }

</script>

