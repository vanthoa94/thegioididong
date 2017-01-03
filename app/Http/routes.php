<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("admin/login","Admin\LoginController@index");
Route::get("admin/logout","Admin\LoginController@logout");
Route::post("admin/login","Admin\LoginController@login");


Route::get("error/account","Admin\ErrorController@account");
Route::get("error/permission","Admin\ErrorController@permission");

Route::group(['middleware'=>'auth','prefix'=>'admin','namespace' => 'Admin'],function(){
	Route::get("/","IndexController@index");
	Route::get("removecookie","IndexController@removecookie");
	Route::post("listonline","IndexController@listonline");
	Route::group(['prefix'=>'category'],function(){
		Route::get("/","CategoryController@index");
		Route::get("create","CategoryController@create");
		Route::post("create","CategoryController@postCreate");

		Route::get("{id}","CategoryController@update")->where('id','[0-9]+');
		Route::post("update","CategoryController@postUpdate");

		Route::post("delete","CategoryController@postDelete");

		Route::post("show_home","CategoryController@show_home");
		Route::post("display","CategoryController@display");

		Route::post("sort","CategoryController@sort");
	});

	Route::group(['prefix'=>'menu'],function(){
		Route::get("/","MenuController@index");
		Route::get("create","MenuController@create");
		Route::post("create","MenuController@postCreate");

		Route::get("{id}","MenuController@update")->where('id','[0-9]+');
		Route::post("update","MenuController@postUpdate");

		Route::post("delete","MenuController@postDelete");

		Route::post("show_menu_top","MenuController@show_menu_top");
		Route::post("show_footer","MenuController@show_footer");

		Route::post("sort","MenuController@sort");
	});

	Route::group(['prefix'=>'product'],function(){
		Route::get("/","ProductController@index");
		Route::get("create","ProductController@create");
		Route::post("create","ProductController@postCreate");

		Route::get("{id}","ProductController@update")->where('id','[0-9]+');
		Route::post("update","ProductController@postUpdate");

		Route::post("delete","ProductController@postDelete");
	

		Route::post("show_home","ProductController@show_home");
		Route::post("display","ProductController@display");

		Route::post("sort","ProductController@sort");

		Route::post("hides","ProductController@hides");
		Route::post("displays","ProductController@displays");
		Route::post("showhomes","ProductController@showhomes");
		Route::post("hidehomes","ProductController@hidehomes");
		
	
	});

	Route::group(['prefix'=>'muc-luc'],function(){
		Route::get("{id}","MucLucController@index")->where('id','[0-9]+');
		Route::get("create/{id}","MucLucController@create")->where('id','[0-9]+');
		Route::post("create","MucLucController@postCreate");

		Route::get("update/{id}","MucLucController@update")->where('id','[0-9]+');
		Route::post("update","MucLucController@postUpdate");

		Route::post("delete","MucLucController@postDelete");

		Route::post("deletes","MucLucController@postDeletes");
	
		Route::post("display","MucLucController@display");

		Route::post("sort","MucLucController@sort");

		Route::post("hides","MucLucController@hides");
		Route::post("displays","MucLucController@displays");
		
	
	});

	Route::group(['prefix'=>'page'],function(){
		Route::get("/","PageController@index");
		Route::get("iframe","PageController@iframe");
		Route::get("create","PageController@create");
		Route::post("create","PageController@postCreate");

		Route::get("{id}","PageController@update")->where('id','[0-9]+');
		Route::post("update","PageController@postUpdate");

		Route::post("delete","PageController@postDelete");
		Route::post("deletes","PageController@postDeletes");

		Route::post("display","PageController@display");
	
	});

	Route::group(['prefix'=>'slide'],function(){
		Route::get("/","SlideController@index");
		Route::get("create","SlideController@create");
		Route::post("create","SlideController@postCreate");

		Route::get("{id}","SlideController@update")->where('id','[0-9]+');
		Route::post("update","SlideController@postUpdate");

		Route::post("delete","SlideController@postDelete");
		Route::post("deletes","SlideController@postDeletes");

		Route::post("display","SlideController@display");

		Route::post("sort","SlideController@sort");
	
	});

	Route::group(['prefix'=>'video'],function(){
		Route::get("/","VideoController@index");
		Route::get("create","VideoController@create");
		Route::post("create","VideoController@postCreate");

		Route::get("{id}","VideoController@update")->where('id','[0-9]+');
		Route::post("update","VideoController@postUpdate");

		Route::post("delete","VideoController@postDelete");
		Route::post("deletes","VideoController@postDeletes");

		Route::post("display","VideoController@display");
	
	});

	Route::group(['prefix'=>'ad'],function(){
		Route::get("/","AdController@index");
		Route::get("create","AdController@create");
		Route::post("create","AdController@postCreate");

		Route::get("{id}","AdController@update")->where('id','[0-9]+');
		Route::post("update","AdController@postUpdate");

		Route::post("delete","AdController@postDelete");
		Route::post("deletes","AdController@postDeletes");

		Route::post("display","AdController@display");

	});

	Route::group(['prefix'=>'user'],function(){
		Route::get("/","UserController@index");
		Route::get("create","UserController@create");
		Route::post("create","UserController@postCreate");

		Route::get("{id}","UserController@update")->where('id','[0-9]+');
		Route::post("update","UserController@postUpdate");

		Route::post("delete","UserController@postDelete");
		Route::post("deletes","UserController@postDeletes");

		Route::post("blocks","UserController@postBlocks");
		Route::post("unlocks","UserController@postUnlocks");

		Route::post("block","UserController@block");
		
		Route::post("reset","UserController@reset");
	
	});

	Route::group(['prefix'=>'admin'],function(){
		Route::get("/","AdminController@index");
		Route::get("create","AdminController@create");
		Route::post("create","AdminController@postCreate");

		Route::get("{id}","AdminController@update")->where('id','[0-9]+');
		Route::post("update","AdminController@postUpdate");

		Route::post("delete","AdminController@postDelete");
		Route::post("deletes","AdminController@postDeletes");

		Route::post("blocks","AdminController@postBlocks");
		Route::post("unlocks","AdminController@postUnlocks");

		Route::post("block","AdminController@block");
		
		Route::post("reset","AdminController@reset");
	
	});

	Route::group(['prefix'=>'group-admin'],function(){
		Route::get("/","GroupAdminController@index");
		Route::get("create","GroupAdminController@create");
		Route::post("create","GroupAdminController@postCreate");

		Route::get("{id}","GroupAdminController@update")->where('id','[0-9]+');
		Route::post("update","GroupAdminController@postUpdate");

		Route::post("delete","GroupAdminController@postDelete");
		Route::post("deletes","GroupAdminController@postDeletes");

	});

	Route::group(['prefix'=>'order'],function(){
		Route::get("/","OrderController@index");
		Route::post("active","OrderController@active");
		Route::post("actives","OrderController@actives");

		Route::post("deactives","OrderController@deactives");

		Route::post("delete","OrderController@postDelete");
		Route::post("deletes","OrderController@postDeletes");

	});

	Route::get("uploadimage","UploadController@upload");
    Route::post("uploadimage","UploadController@upload");
    Route::post("ajax/loadfolder","UploadController@loadfolder");
    Route::post("upload/checkfile","UploadController@checkfile");
    Route::post("ajax/removeimg","UploadController@removeimg");
    Route::post("ajax/removefolder","UploadController@removefolder");
    Route::post("ajax/count","IndexController@count");
    Route::post("ajax/createfolder","UploadController@createfolder");
    Route::post("ajax/loadonlyfolder","UploadController@loadonlyfolder");
    
    Route::get("profile","AdminController@profile");
    Route::post("profile","AdminController@postProfile");

    Route::get("changepass","AdminController@changepass");
    Route::post("changepass","AdminController@postChange");

    Route::group(['prefix'=>'info'],function(){
		Route::get("/","InfoController@index");
		Route::post("postinfoall","InfoController@postinfoall");
		Route::post("contact","InfoController@contact");
		Route::post("setting","InfoController@setting");
		Route::post("changefavicon","InfoController@changefavicon");
		Route::post("changelogo","InfoController@changelogo");
	});

	Route::group(['prefix'=>'setting'],function(){
		Route::get("/","SettingController@index");
		Route::post("update","SettingController@update");
	});

    Route::group(['prefix'=>'tag'],function(){
		Route::get("/","TagController@index");
		Route::get("create","TagController@create");
		Route::post("create","TagController@postCreate");

		Route::get("{id}","TagController@update")->where('id','[0-9]+');
		Route::post("update","TagController@postUpdate");

		Route::post("delete","TagController@postDelete");

		Route::post("display","TagController@display");
	

		Route::post("sort","TagController@sort");
	});

	Route::group(['prefix'=>'support'],function(){
		Route::get("/","SupportController@index");

		Route::get("create","SupportController@create");
		Route::post("create","SupportController@postCreate");

		Route::get("{id}","SupportController@update")->where('id','[0-9]+');
		Route::post("update","SupportController@postUpdate");
		
		Route::post("delete","SupportController@postDelete");
		Route::post("deletes","SupportController@postDeletes");

		Route::post("display","SupportController@display");
	});

});

Route::post('position_user','UI\MuaSachController@position_user');

Route::group(['middleware'=>'count_user','namespace' => 'UI'],function(){
	Route::get('/','HomeController@index');


	Route::get('tim-kiem.html','HomeController@search');

	Route::get('lien-he.html','ContactController@index');

	Route::post('lien-he.html','ContactController@send');

	Route::get('login-face','UserController@login');

	Route::post('loginweb','UserController@postLogin');


	Route::post('mua-sach','MuaSachController@index');
	Route::post('mua-sach/huy','MuaSachController@huy');
	Route::post('kt-mua-sach','MuaSachController@checkMuaSach');

	Route::get('sach-cua-ban.html','CategoryController@mybook');

	Route::get('user/logout','UserController@logout');

	Route::get('video.html','VideoController@index');

	Route::get('video/{url}.html','VideoController@detail')->where('url','[a-zA-Z0-9-]+');

	Route::get('tac-gia/{url}.html','CategoryController@tacgia');

	Route::get('page/{url}.html','PageController@index')->where('url','[a-zA-Z0-9-]+');

	Route::get('{url}.html','BookController@index')->where('url','[a-zA-Z0-9-]+');

	Route::get('{url}/{url1}.html','BookController@reader')->where(['url'=>'[a-zA-Z0-9-]+','url1'=>'[a-zA-Z0-9-]+']);

	Route::get('{url}','CategoryController@index')->where('url','[a-zA-Z0-9-]+');
});