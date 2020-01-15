<h3>商品展示</h3>
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
                <td>{{$v->brand_id}}</td>
                <td>{{$v->cate_id}}</td>
                <td><a href="{{url('/goods/edit',$v->gid)}}" class="btn btn-info">编辑</a>
                      <a onclick="ajaxdel({{$v->gid}})" href="javascript:void(0)" class="btn btn-danger">删除</a>
                </td>
            </tr>
           @endforeach
            <tr>
            <td colspan="4">{{$data->appends($query)->links()}}</td>
        </tr>
        </tbody>
    </table>