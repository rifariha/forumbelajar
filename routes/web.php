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

Route::get('/', 'HomePageController@index')->name('homepage');

Auth::routes();

Route::get('/home', 'HomeController@index')->middleware('verified')->name('home');

Auth::routes(['verify' => true]);

// Route::resource('chapters', 'chapterController');

Route::prefix('chapters')->group(function () {
    Route::get('/{id}/topics', 'TopicController@index')->name('chapters.show');
    
    Route::get('/', 'chapterController@index')->name('chapters.index');
    Route::get('/create', 'chapterController@create')->name('chapters.create');
    Route::post('/store', 'chapterController@store')->name('chapters.store');
    Route::get('/{id}/edit', 'chapterController@edit')->name('chapters.edit');
    Route::patch('/{id}/update', 'chapterController@update')->name('chapters.update');
    Route::delete('/{id}/delete', 'chapterController@destroy')->name('chapters.destroy');
});

Route::resource('topics', 'TopicController');

Route::resource('topicLessons', 'TopicLessonController');

Route::resource('permissions', 'PermissionController');

Route::resource('roles', 'RoleController');

Route::resource('users', 'UserController');

Route::resource('forums', 'ForumController');

Route::resource('galleries', 'GalleryController');

Route::resource('messages', 'MessageController');

Route::resource('news', 'NewsController');

Route::resource('newsCategories', 'NewsCategoryController');

Route::resource('sliders', 'SliderController');


Route::resource('backupLogs', 'BackupLogController');

Route::resource('cms', 'CmsController');