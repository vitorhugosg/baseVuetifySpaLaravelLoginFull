<?php

use Illuminate\Http\Request;

Route::group(
	[
		'prefix'=> '/'
	],
	function(){
		Route::post('login', 'auth\authController@login');
		Route::post('register', 'auth\authController@register');
		Route::post('createreset', 'PasswordResetController@create');
		Route::get('find/{token}', 'PasswordResetController@find');
		Route::post('reset', 'PasswordResetController@reset');
	});


Route::group(
	[
		'prefix' => 'blog'
	],
	function(){
		Route::get('get', 'blog\indexController@index');
		Route::get('gettwo', 'blog\indexController@two');
	});

