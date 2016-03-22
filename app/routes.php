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

Route::get('home', function()
{
	return View::make('layout.main');
});
Route::get('/', function()
{
	return View::make('layout.main');
});

//ini google maps
Route::get('dashboard', array('as' => 'dashboard', 'uses' =>'DashboardController@getIndex'));
Route::get('draggable', array('as' => 'draggable', 'uses' =>'DashboardController@getDraggable'));
Route::post('post-draggable', array('as' => 'post-draggable', 'uses' =>'DashboardController@postDraggable'));


//ini google maps
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
Route::get('maps-staticdouble',array('as' => 'maps-staticdouble','uses'=>'MapsController@getStaticdouble'));
Route::get('maps-doubleinfo',array('as' => 'maps-doubleinfo','uses'=>'MapsController@getDoubleinfo'));

//ini openstreet
Route::get('maps-openstreet',array('as' => 'maps-openstreet','uses'=>'OpenstreetController@getOpenstreet'));
Route::get('openstreet-embed',array('as' => 'openstreet-embed','uses'=>'OpenstreetController@getEmbed'));

//ini menggunakan database
Route::get('database-first',array('as' => 'database-first','uses'=>'DatabaseController@getFirst'));

//ini buat coba login
Route::get('login',array('as' => 'login','uses'=>'LoginController@getLogin'));
Route::get('drag',array('as' => 'drag','uses'=>'LoginController@getDrag'));
