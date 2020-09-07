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


Route::get('/admin', 'AdminController@dashboard'); //done
Route::get('/admin/users', 'AdminController@adminPanel');//done
Route::get('/admin/view', 'AdminController@viewAdmins');//done
Route::get('/admin/create', 'AdminController@createAdminForm');//done
Route::post('/admin/create', 'AdminController@createAdmin');//done
Route::get('/admin/edit/{id}', 'AdminController@editAdminForm'); //done
Route::post('/admin/edit/{id}', 'AdminController@editAdmin'); //done
Route::get('/admin/delete/{id}', 'AdminController@deleteAdmin');//done

//do the same for speakers -> imageController -created
//, episodes -> audio controller -created
//, series 
//, topics


/*
//Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
*/