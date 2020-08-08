<?php

use App\Http\Controllers\MyPageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/home','HomeController@index')->name('home');

Route::get('/mypage','MyPageController@myPage')->name('mypage');
Route::get('/my-favorite','MypageController@myFavorite')->name('my-favorite');

Route::resource('/routine','RoutineController',['except'=>'index']);

Route::resource('/routine-item','RoutineItemController',['except'=>'show']);

Route::post('/favorite','FavoriteController@favorite');