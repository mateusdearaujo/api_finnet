<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', 'web\ViewController@index');

Route::get('/cadastrar', 'web\ViewController@new');

Route::get('/editar', 'web\ViewController@edit');
