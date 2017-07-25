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
Route::get('/', 'HomeController@home');

Route::get('/profile', 'ProfileController@index');

Route::post('/edit_profile', 'ProfileController@update');

Route::post('/profile/edit', 'ProfileController@edit');

Route::get('/suggest', 'SuggestController@index');


Route::post ( '/addHamada', 'HamadaController@index' );
Route::get ( '/getHamada', 'HamadaController@read' );
//////////////////////////////////////////////////////////////////////////////
Route::post ( '/create', 'SuggestController@create' );
Route::post ( '/edit_topic', 'SuggestController@edit_topic' );

Route::post ( '/edit_content', 'SuggestController@edit_content' );
Route::post ( '/delete', 'SuggestController@delete' );

Route::get('/topic/{id}', 'TopicController@index');
Route::post ( '/dointerest', 'TopicController@do_interest' );
Route::post ( '/removeinterest', 'TopicController@remove_interest' );
Route::get('/profile/{id}', 'ProfileController@user_profile');


Route::post ( '/dofollow', 'FollowController@do_follow' );
Route::post ( '/removefollow', 'FollowController@remove_follow' );



Auth::routes();



