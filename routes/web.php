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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'ProjectsController@index');
Route::resource('projects', 'ProjectsController');
Route::resource('tasks', 'TasksController');
Route::post('tasks/{id}/check', 'TasksController@check')->name('tasks.check');
