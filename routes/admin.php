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
Route::get('/', function () {
    return view('welcome');
});
Auth::routes(['verify' => true]);
Route::group(['middleware' => 'verified'], function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('users', 'UsersController');
    Route::resource('settings', 'SettingsController');
    Route::resource('details', 'DetailsController');
    Route::resource('documents', 'DocumentsController');
    Route::resource('educations', 'EducationsController');
    Route::resource('experiences', 'ExperiencesController');
    Route::resource('portfolios', 'PortfoliosController');
    Route::resource('profiles', 'ProfilesController');
    Route::resource('skills', 'SkillsController');

});


