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
	return View::make('pages/index');
});

Route::get('/{casestudy}', function($casestudy) {
	$pages = array('imvid','axess','c2c','apex','csg','mm');
	return View::make('pages/'.$casestudy)->with('pages',$pages)->with('case',$casestudy);
});
