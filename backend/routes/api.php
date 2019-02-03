<?php

use Illuminate\Http\Request;


Route::post('login', 'auth\authController@login');
Route::post('register', 'auth\authController@register');
Route::post('createreset', 'PasswordResetController@create');
Route::get('find/{token}', 'PasswordResetController@find');
Route::post('reset', 'PasswordResetController@reset');

