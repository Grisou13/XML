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

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::post("/trackings","HomeController@uploadXml");
Route::get("/trackings","HomeController@allXml");
Route::get("/trackings/create","HomeController@addXml");
Route::get("/trackings/{tracking}","HomeController@showXml");
Route::get("/trackings/{tracking}/raw",function(App\Tracking $tracking){

  return response()->file(storage_path("app/".$tracking->file_path));
});
