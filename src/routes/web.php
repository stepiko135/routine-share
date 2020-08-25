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

Auth::routes();

Route::middleware(['auth','can:isAdmin'])->group(function(){
    Route::get('/admin','AdminController@index');
    Route::get('/admin/routine','AdminController@routine');
    Route::delete('/admin','AdminController@delete');
});

Route::get('/','HomeController@index')->name('home');
Route::get('/ranking','RankingController@index')->name('ranking');

Route::get('/mypage','MyPageController@myPage')->name('mypage');
Route::get('/my-favorite','MyPageController@myFavorite');

Route::resource('/routine','RoutineController',['except'=>'index']);

Route::resource('/routine-item','RoutineItemController',['except'=>'index','show','create','edit']);

Route::post('/favorite','FavoriteController@favorite');

Route::resource('/profile','UserController');