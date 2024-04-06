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

Route::middleware('auth:api')->get('/user', function (Request $request) {
   return $request->user();
});
Route::post('login', 'Api\AuthController@login');
Route::group([
   'middleware' => ['api', 'jwt.verify'],
], function ($router) {
   
   Route::post('logout', 'Api\AuthController@logout');
   Route::post('refresh', 'Api\AuthController@refresh');
   Route::post('me', 'Api\AuthController@me');
});
Route::prefix('users')->group(function () {
   Route::post('/', 'Api\UserController@store');
});
Route::prefix('types')->group(function () {
   Route::get('/', 'Api\TypeController@index');
   Route::post('/', 'Api\TypeController@store');
   Route::put('/{type}', 'Api\TypeController@update');
   Route::delete('/{type}', 'Api\TypeController@delete');
   Route::get('/{type}', 'Api\TypeController@view');
});
Route::prefix('articles')->group(function () {
   Route::get('/', 'Api\ArticleController@index');
   Route::get('/{article}', 'Api\ArticleController@view');

      Route::post('/', 'Api\ArticleController@store');
      Route::put('/{article}', 'Api\ArticleController@update');
      Route::delete('/{article}', 'Api\ArticleController@delete');

});
Route::prefix('writers')->group(function () {
   Route::get('/', 'Api\WriterController@index');
   Route::post('/', 'Api\WriterController@store');
   Route::put('/{writer}', 'Api\WriterController@update');
   Route::delete('/{writer}', 'Api\WriterController@delete');
   Route::get('/{writer}', 'Api\WriterController@view');
});
Route::prefix('keywords')->group(function () {
   Route::get('/', 'Api\KeywordController@index');
   Route::post('/', 'Api\KeywordController@store');
   Route::put('/{keyword}', 'Api\KeywordController@update');
   Route::get('/{keyword}', 'Api\KeywordController@view');
   Route::delete('/{keyword}', 'Api\KeywordController@delete');
});
