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
Route::get('/','HomePageController@index' );
Route::get('/listing','ListingController@index' );
Route::get('/category/{name}','ListingController@listing' );
Route::get('/author/{name}','ListingController@listing1' );
Route::get('/details/{slug}',['uses'=>'DetailsPageController@index','as'=>'details'] );
Route::post('/comments', 'DetailsPageController@comment');
Route::get('/laravel', function () {
    return view('welcome');
    }); 
Route::get('/hello', function () {
    return 'Hello World';
    });
Route::get('/hello/{id}/{name?}', function ($id,$name="Rajiv") {
    return 'Hello, Your id is : '.$id.". Your Name is : ".$name;
    })->where ('id','[0-9]+');

Route::get('/world','MyController@helloMethod');
Route::get('/add','AddController@index');
Route::get('/contact', function () {
    return view('contact');
    });
Route::get('/about',['uses'=>'AboutController@about','as'=>'about'] );
Route::group(['prefix'=>'back','middleware'=>'auth'],function ()
{
    Route::get('/','Admin\DashboardController@index');
    //Route::get('/category','Admin\CategoryController@index');
    //Route::get('/category/create','Admin\CategoryController@create');
    //Route::get('/category/edit','Admin\CategoryController@edit');

    //Permission
    //Route::get('/permission','Admin\PermissionController@index'); //list without permission privilage
    Route::get('/permission',['uses'=>'Admin\PermissionController@index','as'=>'permission-list','middleware'=>'permission:Permission List|Post Add|All']);

    Route::get('/permission/create',['uses'=>'Admin\PermissionController@create','as'=>'permission-create','middleware'=>'permission:Permission Add|All']);
    Route::post('/permission/store',['uses'=>'Admin\PermissionController@store','as'=>'permission-store','middleware'=>'permission:Permission Add|All']);
    Route::get('/permission/edit/{id}',['uses'=>'Admin\PermissionController@edit','as'=>'permission-edit','middleware'=>'permission:Permission Update|All']);
    Route::put('/permission/edit/{id}',['uses'=>'Admin\PermissionController@update','as'=>'permission-update','middleware'=>'permission:Permission Update|All']);
    Route::delete('/permission/delete/{id}',['uses'=>'Admin\PermissionController@destroy','as'=>'permission-destroy','middleware'=>'permission:Permission Delete|All']);

    //Role
    Route::get('/role','Admin\RoleController@index');
    Route::get('/role/create','Admin\RoleController@create');
    Route::post('/role/store','Admin\RoleController@store');
    Route::get('/role/edit/{id}',['uses'=>'Admin\RoleController@edit','as'=>'role-edit']);
    Route::put('/role/edit/{id}',['uses'=>'Admin\RoleController@update','as'=>'role-update']);
    Route::delete('/role/delete/{id}',['uses'=>'Admin\RoleController@destroy','as'=>'role-delete']);

    //Auther
    Route::get('/author','Admin\AuthorController@index');
    Route::get('author/create','Admin\AuthorController@create');
    Route::post('/author/store','Admin\AuthorController@store');
    Route::get('/author/edit/{id}',['uses'=>'Admin\AuthorController@edit','as'=>'author-edit']);
    Route::put('/author/edit/{id}',['uses'=>'Admin\AuthorController@update','as'=>'author-update']);
    Route::delete('/author/delete/{id}',['uses'=>'Admin\AuthorController@destroy','as'=>'author-delete']);


    //Route::get('/category','Admin\CategoryController@index');

    //Category 
    Route::get('/category',['uses'=>'Admin\CatController@index','as'=>'category-list','middleware'=>'permission:Category List|All']);
    Route::get('/category/create',['uses'=>'Admin\CatController@create','as'=>'category-create','middleware'=>'permission:category Add|All']);
    Route::post('/category/store',['uses'=>'Admin\CatController@store','as'=>'category-store','middleware'=>'permission:category Add|All']);
    Route::put('/category/status/{id}',['uses'=>'Admin\CatController@status','as'=>'category-status','middleware'=>'permission:category Update|category Add|All']);
    Route::get('/category/edit/{id}',['uses'=>'Admin\CatController@edit','as'=>'category-edit','middleware'=>'permission:category Update|category Add|All']);
    Route::put('/category/update/{id}',['uses'=>'Admin\CatController@update','as'=>'category-update','middleware'=>'permission:category Update|All']);
    Route::delete('/category/delete/{id}',['uses'=>'Admin\CatController@destroy','as'=>'category-destroy','middleware'=>'permission:category Delete|All']);

    //Category 
    Route::get('/posts',['uses'=>'Admin\PostController@index','as'=>'post-list','middleware'=>'permission:Post List|Post Update|Post Delete|Post Add|All']);
    Route::get('/posts/create',['uses'=>'Admin\PostController@create','as'=>'post-create','middleware'=>'permission:Post List|Post Update|Post Delete|Post Add|All']);
    Route::post('/posts/store',['uses'=>'Admin\PostController@store','as'=>'post-store','middleware'=>'permission:Post List|Post Update|Post Delete|Post Add|All']);
    Route::put('/posts/status/{id}',['uses'=>'Admin\PostController@status','as'=>'post-status','middleware'=>'permission:Post List|Post Update|Post Delete|Post Add|All']);
    Route::put('/posts/hot/news/{id}',['uses'=>'Admin\PostController@hot_news','as'=>'post-hot news','middleware'=>'permission:Post List|Post Update|Post Delete|Post Add|All']);
    Route::get('/posts/edit/{id}',['uses'=>'Admin\PostController@edit','as'=>'post-edit','middleware'=>'permission:Post List|Post Update|Post Delete|Post Add|All']);
    Route::put('/posts/update/{id}',['uses'=>'Admin\PostController@update','as'=>'post-update','middleware'=>'permission:Post List|Post Update|Post Delete|Post Add|All']);
    Route::delete('/posts/delete/{id}',['uses'=>'Admin\PostController@destroy','as'=>'post-destroy','middleware'=>'permission:Post List|Post Update|Post Delete|Post Add|All']);

    //Comments
    Route::get('/comment/{id}',['uses'=>'Admin\CommentController@index','as'=>'comment-list','middleware'=>'permission:Post List|Post Update|Post Delete|Comment Add|All']);
    Route::put('/comment/status/{id}',['uses'=>'Admin\CommentController@status','as'=>'comment-status','middleware'=>'permission:Post List|Post Update|Post Delete|Comment Add|All']);
    Route::get('/comment/reply/{id}',['uses'=>'Admin\CommentController@reply','as'=>'comment-reply','middleware'=>'permission:Post List|Post Update|Post Delete|Comment Add|All']);
    Route::post('/comment/reply',['uses'=>'Admin\CommentController@store','as'=>'comment-store','middleware'=>'permission:Post List|Post Update|Post Delete|Comment Add|All']);

    //Settings
    ROute::get('/settings',['uses'=>'Admin\SettingController@index','as'=>'setting','middleware'=>'permission:Post List|Post Update|Post Delete|Comment Add|All']);
    ROute::post('/settings/update',['uses'=>'Admin\SettingController@update','as'=>'setting-update','middleware'=>'All']);
});

Route::get('/query','DbController@index');
Route::get('/joining','DbController@joining');

ROute::get('/model','DbController@model');
//Route::view('/about','about');
//Route::view('/contact','contact');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
