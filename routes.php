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

Route::get('/', function () {
    return File::get(resource_path().'/views/index.html');
});

//return all player records
Route::get('players', 'playerController@readPlayers');

//return specific player record
Route::get('/players/{id}', 'playerController@readSpecificPlayer');

//update specific player record
Route::post('players/{id}/edit', 'playerController@updatePlayer');

//create a player record
Route::post('players/post', 'playerController@addPlayer');

//delete a player record
Route::get('players/{id}/delete', 'playerController@deletePlayer');

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

Route::group(['middleware' => ['web']], function () {
    //
});
