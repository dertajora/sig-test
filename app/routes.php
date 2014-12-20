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
Route::get('maps-search', array('as' => 'maps-search', 'uses' =>'MapsController@getSearch'));
Route::get('maps-direction', array('as' => 'maps-direction', 'uses' =>'MapsController@getDirection'));
Route::get('maps-embed', array('as' => 'maps-embed', 'uses' =>'MapsController@getEmbed'));
Route::get('maps-places', array('as' => 'maps-places', 'uses' =>'MapsController@getPlaces'));
Route::get('maps-view', array('as' => 'maps-view', 'uses' =>'MapsController@getView'));
Route::get('maps-static', array('as' => 'maps-static', 'uses' =>'MapsController@getStatic'));
Route::get('maps-marker', array('as' => 'maps-marker', 'uses' =>'MapsController@getMarker'));
Route::get('maps-geolocation', array('as' => 'maps-geolocation', 'uses' =>'MapsController@getGeolocation'));
Route::get('maps-signedin', array('as' => 'maps-signedin', 'uses' =>'MapsController@getSignedin'));
Route::get('maps-infowindow', array('as' => 'maps-infowindow', 'uses' =>'MapsController@getInfowindow'));
Route::get('maps-icon', array('as' => 'maps-icon', 'uses' =>'MapsController@getIcon'));

