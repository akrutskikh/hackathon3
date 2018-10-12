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

Route::get('/', 'SongController@listing');
Route::get('/', 'SongController@listing');
Route::get('/create', 'SongController@create');
Route::post('/create', 'SongController@store');
Route::get('/edit', 'SongController@edit');
Route::post('/edit', 'SongController@store');
Route::get('/delete', 'SongController@delete');
Route::get('/jukebox', 'SongController@jukebox');


Route::get('/artist', 'ArtistController@bio');

// Route::get('/games/create', 'GameController@create');
// Route::post('/games/create', 'GameController@store');
// Route::get('/games/edit', 'GameController@edit');
// Route::post('/games/edit', 'GameController@store');