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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Home',function (){
    return view('Home');
});
Route::get('/admin','ArticleController@index')->name('adminHome');
Route::get('/admin/berita/create','ArticleController@createBerita')->name('createBerita');
Route::post('/admin/berita/create','ArticleController@store')->name('beritaSuccess');
Route::get('/admin/hapus/{id}','ArticleController@destroy')->name('hapusBerita');
Route::get('/admin/edit/{id}','ArticleController@edit')->name('editBerita');
Route::post('/admin/edit/{id}','ArticleController@update')->name('updateBerita');

Route::get('/admin/schedule/index','ScheduleController@index');
Route::get('/admin/schedule/create','ScheduleController@create')->name('createSchedule');
Route::post('/admin/schedule/create','ScheduleController@store')->name('scheduleSuccess');
Route::get('/admin/schedule/edit/{id}','ScheduleController@edit')->name('editSchedule');
Route::post('/admin/schedule/edit/{id}','ScheduleController@update')->name('updateSuccess');
Route::get('/admin/schedule/delete/{id}','ScheduleController@destroy')->name('deleteSchedule');
?>
