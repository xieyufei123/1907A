 @foreach($data as $v)
            <tr>
                <td>{{$v->gid}}</td>
                <td><img src="{{env('UPLOAD_URL')}}{{$v->goods_img}}" width="50" height="50"/>{{$v->goods_name}}</td>
                <td>{{$v->goods_price}}</td>
                <td>{{$v->bid}}</td>
                <td>{{$v->cid}}</td>
                <td><a href="{{url('/goods/edit',$v->gid)}}" class="btn btn-info">编辑</a>
                    <a href="{{url('/goods/destroy',$v->gid)}}" class="btn btn-danger">删除</a>
                </td>
            </tr>
           @endforeach
   
        <tr>
            <td colspan="4">{{$data->appends($query)->links()}}</td>
        </tr>