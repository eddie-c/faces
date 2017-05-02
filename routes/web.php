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






Route::group(['middleware'=>'login'],function(){


    Route::post('/getRecentImgList', "RecentImgController@getListByUuid");

    Route::post('/getFavoriteImgList', "FavoriteImgController@getListByUuid");

    Route::post('/getMostPopularImgList', "MostPopularController@getListByUuid");

    Route::get('/addImgReference/{imgid}',"ImgController@addImgReference");

});

Route::get('/index', "IndexController@index");
Route::post('/searchresult',"Search@searchImg");
Route::get('/search',"Search@showView");

//Route::get("/main",function(){
//    return view("main");
//});


//Route::get("/addImgToRecentList","RecentImgController@addImgToRecentList");

Route::group(['middleware'=>'web'],function(){
   Route::post('/addToFavorite','SingleImgController@addToFavorite');
   Route::post('/getImgById','SingleImgController@getImgInfoById');
   Route::get('/addToDislike','SingleImgController@addToDislikeList');
   Route::get('/addReference','SingleImgController@addImgReference');
   Route::get('/addToRecent','SingleImgController@addToRecentList');
});