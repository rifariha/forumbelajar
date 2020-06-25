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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('chapters', 'chapterController');

Route::resource('permissions', 'PermissionController');

Route::resource('roles', 'RoleController');

Route::resource('users', 'UserController');

Route::resource('forums', 'ForumController');

Route::resource('galleries', 'GalleryController');

Route::resource('messages', 'MessageController');

Route::resource('news', 'NewsController');

Route::resource('newsCategories', 'NewsCategoryController');

Route::resource('sliders', 'SliderController');

Route::resource('topics', 'TopicController');

Route::resource('topicLessons', 'TopicLessonController');

Route::resource('backupLogs', 'BackupLogController');


Route::resource('cms', 'CmsController');