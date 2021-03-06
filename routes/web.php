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

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::post('/candidates/store', 'Admin\\CandidatesController@store')->name('candidates.store');


Route::group([
                'prefix' => 'admin',
                'namespace' => 'Admin',
                'middleware' => 'auth',
                'as' => 'admin.'
            ], function() 
{
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('skills', 'SkillController');
    Route::resource('candidates', 'CandidatesController');
    Route::resource('interviews', 'InterviewController');
});
