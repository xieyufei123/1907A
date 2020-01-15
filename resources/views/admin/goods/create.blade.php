<link rel="stylesheet" href="\static\admin\css\bootstrap.min.css">
<script src="/static/admin/js/jquery-3.2.1.min.js"></script>
<script src="/static/admin/js/bootstrap.min.js"></script>
<h3>商品添加</h3>
<!-- {{--@if ($errors->any())--}}
    {{--<div class="alert alert-danger">--}}
        {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--@endif--}} -->
<form class="form-horizontal" action="{{url('/goods/store')}}" role="form" method="post" enctype="multipart/form-data">
    @csrf


    <ul id="myTab" class="nav nav-tabs">
        <li class="active">
            <a href="#home" data-toggle="tab">
                基础信息
            </a>
        </li>
        <li><a href="#ios" data-toggle="tab">商品相册</a></li>
        <li><a href="#desc" data-toggle="tab">商品详情</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <p>


            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">商品名称</label>
                <div class="col-sm-10">
                    <input type="text" name="goods_name" class="form-control" id="firstname" placeholder="请输入名字">
<!--                     <b style="color: red">{{ $errors->first('brand_name') }}</b>
 -->                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">商品价格</label>
                <div class="col-sm-10">
                    <input type="text" name="goods_price" class="form-control" id="lastname" placeholder="请输入姓">
                   <!--  <b style="color: red">{{ $errors->first('brand_url') }}</b> -->
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">商品库存</label>
                <div class="col-sm-10">
                    <input type="text" name="goods_num" class="form-control" id="lastname" placeholder="请输入姓">
                 <!-- <b style="color: red">{{ $errors->first('brand_url') }}</b> -->
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">商品缩略图</label>
                <div class="col-sm-10">
                    <input type="file" name="goods_img" class="form-control" id="lastname" placeholder="请输入姓">
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">所属分类</label>
                <div class="col-sm-10">
                    <select id="lastname" name="cate_id">
                         <option value="0">请选择父极分类</option>
            @foreach($cate as $v)
            <option value="{{$v->cate_id}}">{{str_repeat('|-',$v->level)}}{{$v->cate_name}}</option>
                @endforeach
                    </select>
                </div>
            </div>
             <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">所属品牌</label>
                <div class="col-sm-10">
                    <select id="lastname" name="brand_id">
                        <option value="0">--请选择--</option>
                        @foreach ($brand as $v)
                        <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            </p>
        </div>
        <div class="tab-pane fade" id="ios">
            <p>


            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">商品相册</label>
                <div class="col-sm-10">
                    <input type="file" name="goods_imgs[]" class="form-control" multiple="multiple" id="lastname" placeholder="请输入姓">
                </div>
            </div>


            </p>
        </div>
        <div class="tab-pane fade" id="desc">
            <p>


            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">商品详情</label>
                <div class="col-sm-10">
                    <textarea type="text" name="goods_desc" class="form-control" id="lastname" placeholder="请输入姓"></textarea>
                </div>
            </div>


            </p>
        </div>
<div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" class="btn btn-default" value="添加">
    </div>
</form>
