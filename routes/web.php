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
    return view('home');
});

// Route::get('/speakers', function () {
//     return view('speakers');
// });

Route::get('/speakers', 'ImageController@show'); 

Route::get('/topics', function () {
    return view('topics');
});

Route::get('/series', function () {
    return view('series');
});


Route::get('/recents', function () {
    return view('recents');
});

// Route::get('/episodes', function () {
//     return view('episodes');
// });

Route::get('/episodes', 'AudioController@show'); 

// Route::get('/episode', function () {
//     return view('episode');
// });

Route::get('/episode/{id}', 'AudioController@showEpisode'); 

Route::get('/test', 'AudioController@create');
Route::post('/test', 'AudioController@store');
// Route::get('/test/{audio}', 'AudioController@show');

Route::get('/testImage', 'ImageController@create');
Route::post('/testImage', 'ImageController@store');
Route::get('/testImage/{image}', 'ImageController@show'); 