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
    Route::get('/', 'chapterController@index')->name('chapters.index');
    Route::get('/create', 'chapterController@create')->name('chapters.create');
    Route::post('/store', 'chapterController@store')->name('chapters.store');
    Route::get('/{id}/edit', 'chapterController@edit')->name('chapters.edit');
    Route::patch('/{id}/update', 'chapterController@update')->name('chapters.update');
    Route::delete('/{id}/delete', 'chapterController@destroy')->name('chapters.destroy');

    Route::get('/{id}/topics', 'TopicController@index')->name('chapters.show');
    Route::get('/{id}/topics/create', 'TopicController@create')->name('topics.create');
    Route::post('/{id}/topics/create', 'TopicController@store')->name('topics.store');
    Route::get('/{id}/topics/{topic_id}/edit', 'TopicController@edit')->name('topics.edit');
    Route::patch('/{id}/topics/{topic_id}/update', 'TopicController@update')->name('topics.update');
    Route::delete('/{id}/topics/{topic_id}/delete', 'TopicController@destroy')->name('topics.destroy');

    Route::get('/{id}/topics/{topic_id}/lesson', 'TopicLessonController@index')->name('topics.show');
    Route::get('/{id}/topics/{topic_id}/lesson/create', 'TopicLessonController@create')->name('topicLessons.create');
    Route::post('/{id}/topics/{topic_id}/lesson/create', 'TopicLessonController@store')->name('topicLessons.store');
    Route::get('/{id}/topics/{topic_id}/lesson/{lesson_id}/edit', 'TopicLessonController@edit')->name('topicLessons.edit');
    Route::patch('/{id}/topics/{topic_id}/lesson/{lesson_id}/update', 'TopicLessonController@update')->name('topicLessons.update');
    Route::post('/{id}/topics/{topic_id}/lesson/{lesson_id}/delete', 'TopicLessonController@destroy')->name('topicLessons.destroy');

    Route::post('/{id}/topics/{topic_id}/lesson/comment', 'ForumController@store')->name('forums.store');
    Route::post('/{id}/topics/{topic_id}/lesson/comment/{comment_id}/delete', 'ForumController@destroy')->name('forums.destroy');
}); 
    
    
Route::prefix('forums')->group(function () {
    Route::get('/', 'ForumController@index')->name('forums.index');
    Route::get('/create', 'ForumController@create')->name('forums.create');
    Route::get('/{id}/edit', 'ForumController@edit')->name('forums.edit');
    Route::patch('/{id}/update', 'ForumController@update')->name('forums.update');
});

Route::resource('messages', 'MessageController');

Route::prefix('messages')->group(function () {
    Route::get('/sent-items/{batch_id}/detail', 'MessageController@sentItemDetail')->name('sentitem.show');
    Route::post('/sent-items/{batch_id}/detail', 'MessageController@resend')->name('messages.resend');
});

Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfileController@edit')->name('profile.edit');
    Route::patch('/update', 'ProfileController@update')->name('profile.update');
    Route::patch('/change-password', 'ProfileController@changePassword')->name('profile.changepassword');
});

Route::resource('permissions', 'PermissionController');

Route::resource('roles', 'RoleController');

Route::resource('users', 'UserController');

Route::resource('galleries', 'GalleryController');

Route::resource('news', 'NewsController');

Route::resource('newsCategories', 'NewsCategoryController');

Route::resource('sliders', 'SliderController');

Route::resource('backupLogs', 'BackupLogController');

Route::resource('cms', 'CmsController');

Route::resource('newsCategories', 'NewsCategoryController');