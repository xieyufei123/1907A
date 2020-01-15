<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//闭包路由
Route::get('/xyf', function () {
    return "hello";
});
//控制器方法路由
Route::get('/aa','Indexcontroller@test');

//路由视图

Route::view('/bb','hello',['name'=>'魏无羡']);
//Route::view('/login','login');
Route::get('/login','Indexcontroller@test');

//Route::match(['get','post'],'/login','Indexcontroller@login');
Route::any('/login','Indexcontroller@login');

Route::post('/dologin','Indexcontroller@dologin');
//必选参数
// Route::get('/goods/{id}','Indexcontroller@goods')->where('id','\d+');
//可选参数
Route::get('/goods/{id}/{name?}','Indexcontroller@getgoods')->where('id','\d+');


//品牌的曾删改查
Route::prefix('brand')->middleware('checklogin')->group(function(){
//添加
Route::get('create','Brandcontroller@create');
//执行添加
Route::post('store','Brandcontroller@store');
//列表
Route::get('/','Brandcontroller@index');

//编辑
Route::get('edit/{id}','Brandcontroller@edit');
//执行编辑
Route::post('update/{id}','Brandcontroller@update');
//删除
Route::get('destroy/{id}','Brandcontroller@destroy');
});


//学生的曾删改查
//添加
Route::get('/student/create','Studentcontroller@create');
//执行添加
Route::post('/student/store','Studentcontroller@store');
//列表
Route::get('/student','Studentcontroller@index');

//编辑
Route::get('/student/edit/{id}','Studentcontroller@edit');
//执行编辑
Route::post('/student/update/{id}','Studentcontroller@update');
//删除
Route::get('/student/destroy/{id}','Studentcontroller@destroy');


//员工的曾删改查
//添加
Route::get('/work/create','WorkController@create');
//执行添加
Route::post('/work/store','WorkController@store');
//列表
Route::get('/work','WorkController@index');

//编辑
Route::get('/work/edit/{id}','WorkController@edit');
//执行编辑
Route::post('/work/update/{id}','WorkController@update');
//删除
Route::get('/work/destroy/{id}','WorkController@destroy');



//图书添加
Route::get('/book/create','Bookcontroller@create');
//执行添加
Route::post('/book/store','Bookcontroller@store');
//列表
Route::get('/book','Bookcontroller@index');

//商品分类
Route::prefix('cate')->group(function() {
    Route::get('create', 'Categorycontroller@create');
    Route::post('store', 'Categorycontroller@store');
    Route::get('/', 'Categorycontroller@index');
    Route::get('edit/{id}', 'Categorycontroller@edit');
    Route::post('update/{id}', 'Categorycontroller@update');
    Route::get('del/{id}', 'Categorycontroller@destory');
});

//新闻分类
Route::prefix('new')->group(function() {
    Route::get('create', 'Newcontroller@create');
    Route::post('store', 'Newcontroller@store');
    Route::get('/', 'Newcontroller@index');
});

//登录
Route::prefix('login')->group(function(){
    Route::any('/','Logincontroller@index');
    Route::post('do','Logincontroller@do');
    Route::post('logout','Logincontroller@logout');
});

// 商品登录
Route::prefix('checklogin')->group(function(){
    Route::any('/','Checklogin@index');
    Route::post('do','Checklogin@do');
    Route::post('logout','Checklogin@logout');
});

//商品
Route::prefix('goods')->group(function() {
    Route::get('create', 'Goodscontroller@create');
    Route::post('store', 'Goodscontroller@store');
    Route::get('/', 'Goodscontroller@index');
    Route::get('edit/{id}', 'Goodscontroller@edit');
    Route::post('update/{id}', 'Goodscontroller@update');
    Route::get('del/{id}', 'Goodscontroller@destory');
    Route::get('checkOnly', 'Goodscontroller@checkOnly');
    Route::get('show/{id}', 'Goodscontroller@show');
    Route::post('addcart', 'Goodscontroller@addcart');
    Route::post('addDBcart', 'Goodscontroller@addDBcart');

});

//文章
Route::prefix('article')->group(function() {
    Route::get('create', 'Articlecontroller@create');
    Route::post('store', 'Articlecontroller@store');
    Route::get('/', 'Articlecontroller@index');
    Route::get('edit/{id}', 'Articlecontroller@edit');
    Route::post('update/{id}', 'Articlecontroller@update');
     // Route::post('del/{id}', 'Articlecontroller@destroy');
      Route::get('del/{id}', 'Articlecontroller@destroy');
});
//售楼

Route::prefix('sale')->group(function() {
    Route::get('create', 'Salecontroller@create');
    Route::post('store', 'Salecontroller@store');
    Route::get('/', 'Salecontroller@index');
    Route::get('del/{id}', 'Salecontroller@destroy');
     Route::get('xiangqing/{id}', 'Salecontroller@xiangqing');
});
//将cookie添加到响应上
Route::get('/set',function(){
    //response是全局辅助函数
    return response('hello')->cookie('name','zhangsan',2);
});
Route::get('/get',function(){
    //获取cookie值
    return request()->cookie('name');
});

//第二种添加 cookie
Route::get('/set2',function(){
 Illuminate\Support\Facades\Cookie::queue('name', 'lisi', 1);
     // echo request()->cookie('name');
});
//发送验证码
Route::get('send','Bookcontroller@sendemail');



//留言
Route::prefix('message')->middleware('checklogin')->group(function() {
    Route::get('create', 'MessageController@create');
    Route::post('/store', 'MessageController@store');
    Route::get('/', 'MessageController@index');
    Route::get('edit/{id}', 'MessageController@edit');
    Route::post('update/{id}', 'MessageController@update');
      Route::get('destory/{id}', 'MessageController@destroy');
      Route::get('info/{id}', 'MessageController@info');
});