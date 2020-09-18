<?php

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

// 認証
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// トップ画面
Route::get('/', function () {
    return view('top.index');
});

// クイズ画面
Route::get('/quiz',           'QuizController@index');
Route::get('/quiz/list',      'QuizController@list');
Route::get('/quiz/create',    'QuizController@create');
Route::post('/quiz/create',   'QuizController@store');
Route::get('/quiz/show',      'QuizController@show');
Route::get('/quiz/edit',      'QuizController@edit');
Route::post('/quiz/edit',     'QuizController@update');
Route::get('/quiz/delete',    'QuizController@delete');
Route::get('/quiz/challenge', 'QuizController@challenge');
Route::get('/quiz/json', 'QuizController@json');