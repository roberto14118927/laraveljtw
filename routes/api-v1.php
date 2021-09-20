<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');


// Route => grupos para acceso de api TOKEN 
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('user', 'App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::resource('personasApi', 'App\Http\Controllers\Persona\PersonaController', ['only' => ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
});

// Hola Munde
