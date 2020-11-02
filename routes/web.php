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

// Route::get('/login', 'AdminController@login');
Route::get('/admin', 'AdminController@dashboard')->middleware('auth'); //done
Route::get('/admin/users', 'AdminController@adminPanel')->middleware('auth');//done
Route::get('/admin/view', 'AdminController@viewAdmins')->middleware('auth');//done
Route::get('/admin/create', 'AdminController@createAdminForm')->middleware('auth');//done
Route::post('/admin/create', 'AdminController@createAdmin')->middleware('auth');//done
Route::get('/admin/edit/{id}', 'AdminController@editAdminForm')->middleware('auth'); //done
Route::post('/admin/edit/{id}', 'AdminController@editAdmin')->middleware('auth'); //done
Route::get('/admin/delete/{id}', 'AdminController@deleteAdmin')->middleware('auth');//done

//do the same for speakers -> imageController -created
//, episodes -> audio controller -created
//, series 
//, topics //done
//questions
//quran tafseer

//topic routes
Route::get('/admin/topics', 'TopicController@dashboard')->middleware('auth');//done
Route::get('/admin/topics/episodes/{id}', 'TopicController@topicEpisodes')->middleware('auth');//done
Route::get('/admin/topics/view', 'TopicController@viewTopics')->middleware('auth');//done
Route::get('/admin/topics/create', 'TopicController@createTopicForm')->middleware('auth');//done
Route::post('/admin/topics/create', 'TopicController@createTopic')->middleware('auth');//done
Route::get('/admin/topics/edit/{id}', 'TopicController@editTopicForm')->middleware('auth');//done
Route::post('/admin/topics/edit/{id}', 'TopicController@editTopic')->middleware('auth');//done
Route::get('/admin/topics/delete/{id}', 'TopicController@deleteTopic')->middleware('auth');//done

//speaker routes
Route::get('/admin/speakers', 'ImageController@dashboard')->middleware('auth');//done
Route::get('/admin/speakers/view', 'ImageController@viewSpeakers')->middleware('auth');//done
Route::get('/admin/speakers/create', 'ImageController@createSpeakerForm')->middleware('auth');//doneo
Route::post('/admin/speakers/create', 'ImageController@createSpeaker')->middleware('auth');//done
Route::get('/admin/speakers/edit/{id}', 'ImageController@editSpeakerForm')->middleware('auth');//done
Route::post('/admin/speakers/edit/{id}', 'ImageController@editSpeaker')->middleware('auth');//done
Route::get('/admin/speakers/delete/{id}', 'ImageController@deleteSpeaker')->middleware('auth');//done

//episode routes
Route::get('/admin/episode', 'AudioController@dashboard')->middleware('auth');//done
Route::get('/admin/episode/view', 'AudioController@viewEpisodes')->middleware('auth');//done
Route::get('/admin/episode/create', 'AudioController@createEpisodeForm')->middleware('auth');//done
Route::post('/admin/episode/create', 'AudioController@createEpisode')->middleware('auth');//done
Route::get('/admin/episode/edit/{id}', 'AudioController@editEpisodeForm')->middleware('auth');//done
Route::post('/admin/episode/edit/{id}', 'AudioController@editEpisode')->middleware('auth');//done
Route::get('/admin/episode/delete/{id}', 'AudioController@deleteEpisode')->middleware('auth');//done

//series routes
Route::get('/admin/series', 'SeriesController@dashboard')->middleware('auth');//done
Route::get('/admin/series/view', 'SeriesController@viewSeries')->middleware('auth');//done
Route::get('/admin/series/create', 'SeriesController@createSeriesForm')->middleware('auth');//done
Route::post('/admin/series/create', 'SeriesController@createSeries')->middleware('auth');//done
Route::get('/admin/series/edit/{id}', 'SeriesController@editSeriesForm')->middleware('auth');//done
Route::post('/admin/series/edit/{id}', 'SeriesController@editSeries')->middleware('auth');//done
Route::get('/admin/series/delete/{id}', 'SeriesController@deleteSeries')->middleware('auth');//done

//questions
Route::get('/admin/questions', 'QuestionController@dashboard')->middleware('auth');//done
Route::get('/admin/questions/view', 'QuestionController@viewQuestions')->middleware('auth');//done
Route::get('/admin/questions/create', 'QuestionController@createQuestionsForm')->middleware('auth');//done
Route::post('/admin/questions/create', 'QuestionController@createQuestions')->middleware('auth');//done
Route::get('/admin/questions/edit/{id}', 'QuestionController@editQuestionsForm')->middleware('auth');
Route::post('/admin/questions/edit/{id}', 'QuestionController@editQuestions')->middleware('auth');
Route::get('/admin/questions/delete/{id}', 'QuestionController@destroy')->middleware('auth');


/*
//Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
*/

//frontend routes

//home
// Route::get('/', array('as', => 'home', 'uses' => 'GeneralController@home'));
Route::get('/', array('as' => 'home', 'uses' => 'GeneralController@home'));

Route::get('/about', 'GeneralController@about');
// Route::get('/contact', 'GeneralController@contact');
// Route::get('/policy', 'GeneralController@policy');
// Route::get('/donate', 'GeneralController@donate');

//episodes
Route::get('/episodes' ,'AudioController@showEpisodes');//done
Route::get('/episode/{id}', 'AudioController@showEpisode');//done
Route::get('/recents', 'AudioController@recentEpisodes');//done
Route::any('/search', 'AudioController@search');


//speaker
Route::get('/speakers', 'ImageController@showSpeakers');//done
Route::get('/speaker/episodes/{id}', 'ImageController@showSpeakerEpisodes');//done

//topics
Route::get('/topics', 'TopicController@showTopics');//done
Route::get('/topic/episodes/{id}', 'TopicController@showTopicEpisodes');//done

//series
Route::get('/series', 'SeriesController@viewAllSeries');//done
Route::get('/series/view/{id}', 'SeriesController@viewASeries');//done

//questions
Route::get('/questions', 'QuestionController@index');//done
Route::post('/results', 'QuestionController@showResults');//done

Auth::routes();

Route::get('/home', 'GeneralController@home')->name('home');
