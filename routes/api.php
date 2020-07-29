<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user/{id}', 'api\UserController@get');

Route::post('/user', 'api\UserController@new');

Route::put('/user', 'api\UserController@edit');

Route::delete('/user/{id}', 'api\UserController@delete');
