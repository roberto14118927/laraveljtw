<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', 'App\Http\Controllers\UserController@register');
Route::post('login', 'App\Http\Controllers\UserController@authenticate');
// Route::get('login', 'App\Http\Controllers\UserController@authenticate');
// Route::update('login', 'App\Http\Controllers\UserController@authenticate');

// Route::resource('products', 'App\Http\Controllers\Product\ProductController', ['only' => ['index', 'show', 'store', 'update']]);


//Route => grupos para acceso de api TOKEN 
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::post('user', 'App\Http\Controllers\UserController@getAuthenticatedUser');
    Route::resource('personasApi', 'App\Http\Controllers\Persona\PersonaController', ['only' => ['index', 'store', 'show', 'edit', 'update', 'destroy']]);
});
