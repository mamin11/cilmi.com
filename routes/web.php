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

Route::get('/speakers', function () {
    return view('speakers');
});

Route::get('/topics', function () {
    return view('topics');
});

Route::get('/series', function () {
    return view('series');
});


Route::get('/recents', function () {
    return view('recents');
});

Route::get('/episodes', function () {
    return view('episodes');
});

Route::get('/episode', function () {
    return view('episode');
});
