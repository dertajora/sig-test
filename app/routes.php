<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('layout.main');
});
Route::get('maps-test', array('as' => 'maps-test', 'uses' =>'MapsController@getIndex'));
Route::get('maps-embed', array('as' => 'maps-embed', 'uses' =>'MapsController@getEmbed'));
Route::post('register', array('as' => 'register-research', 'uses' => 'MapsController@postRegister'));
