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
//, topics //done
//questions
//quran tafseer

//topic routes
Route::get('/admin/topics', 'TopicController@dashboard');//done
Route::get('/admin/topics/episodes/{id}', 'TopicController@topicEpisodes');//done
Route::get('/admin/topics/view', 'TopicController@viewTopics');//done
Route::get('/admin/topics/create', 'TopicController@createTopicForm');//done
Route::post('/admin/topics/create', 'TopicController@createTopic');//done
Route::get('/admin/topics/edit/{id}', 'TopicController@editTopicForm');//done
Route::post('/admin/topics/edit/{id}', 'TopicController@editTopic');//done
Route::get('/admin/topics/delete/{id}', 'TopicController@deleteTopic');//done

//speaker routes
Route::get('/admin/speakers', 'ImageController@dashboard');//done
Route::get('/admin/speakers/view', 'ImageController@viewSpeakers');//done
Route::get('/admin/speakers/create', 'ImageController@createSpeakerForm');//doneo
Route::post('/admin/speakers/create', 'ImageController@createSpeaker');//done
Route::get('/admin/speakers/edit/{id}', 'ImageController@editSpeakerForm');//done
Route::post('/admin/speakers/edit/{id}', 'ImageController@editSpeaker');//done
Route::get('/admin/speakers/delete/{id}', 'ImageController@deleteSpeaker');//done

//episode routes
Route::get('/admin/episode', 'AudioController@dashboard');//done
Route::get('/admin/episode/view', 'AudioController@viewEpisodes');//done
Route::get('/admin/episode/create', 'AudioController@createEpisodeForm');//done
Route::post('/admin/episode/create', 'AudioController@createEpisode');//done
Route::get('/admin/episode/edit/{id}', 'AudioController@editEpisodeForm');//done
Route::post('/admin/episode/edit/{id}', 'AudioController@editEpisode');//done
Route::get('/admin/episode/delete/{id}', 'AudioController@deleteEpisode');//done

//series routes
Route::get('/admin/series', 'SeriesController@dashboard');//done
Route::get('/admin/series/view', 'SeriesController@viewSeries');//done
Route::get('/admin/series/create', 'SeriesController@createSeriesForm');//done
Route::post('/admin/series/create', 'SeriesController@createSeries');//done
Route::get('/admin/series/edit/{id}', 'SeriesController@editSeriesForm');//done
Route::post('/admin/series/edit/{id}', 'SeriesController@editSeries');//done
Route::get('/admin/series/delete/{id}', 'SeriesController@deleteSeries');//done

//questions
Route::get('/admin/questions', 'QuestionController@dashboard');//done
Route::get('/admin/questions/view', 'QuestionController@viewQuestions');//done
Route::get('/admin/questions/create', 'QuestionController@createQuestionsForm');//done
Route::post('/admin/questions/create', 'QuestionController@createQuestions');//done
Route::get('/admin/questions/edit/{id}', 'QuestionController@editQuestionsForm');
Route::post('/admin/questions/edit/{id}', 'QuestionController@editQuestions');
Route::get('/admin/questions/delete/{id}', 'QuestionController@destroy');


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
Route::get('/contact', 'GeneralController@contact');
Route::get('/policy', 'GeneralController@policy');
Route::get('/donate', 'GeneralController@donate');

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
