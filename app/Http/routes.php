<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', [
//   'as' => 'documents', 'uses' => 'DocumentController@showDocument'
// ]);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::get('/test', ['as' => 'test', function () {
    return view('welcome');
}]);

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', [
      'as' => 'documents', 'uses' => 'DocumentController@showDocument'
    ]);
    Route::get('/home', 'HomeController@index');
    Route::group(['prefix' => 'documents'], function () {
      Route::get('/add', [
        'as' => 'documents-add', 'uses' => 'DocumentController@showAddDocument'
      ]);
      Route::get('/detail/{id}', [
        'as' => 'documents-detail', 'uses' => 'DocumentController@showDetailDocument'
      ]);
      Route::get('/edit/{id}', [
        'as' => 'documents-edit', 'uses' => 'DocumentController@showEditDocument'
      ]);
      Route::post('/post', [
        'as' => 'documents-post', 'uses' => 'DocumentController@postDocument'
      ]);
      Route::post('/edit/post/{id}', [
        'as' => 'documents-edit-post', 'uses' => 'DocumentController@editDocument'
      ]);
      Route::get('/delete/{id}', [
        'as' => 'documents-delete', 'uses' => 'DocumentController@deleteDocument'
      ]);
    });
});
