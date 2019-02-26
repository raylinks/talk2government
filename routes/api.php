<?php

use Illuminate\Http\Request;

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

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

Route::post('/v1/register', 'API\AuthController@reg_api');
Route::post('/v1/login', 'API\AuthController@login');
Route::post('/v1/vision', 'API\AuthController@vision_api');
Route::post('/v1/mission', 'API\AuthController@mission_api');
Route::post('/v1/user', 'ElectionController@user_api');
Route::post('/v1/achievement', 'API\AuthController@achievements_api');
Route::post('/v1/manifestos', 'API\AuthController@manifestos_api');
Route::post('/v1/complains', 'ElectionController@complain_api');
Route::post('/v1/voteme', 'ElectionController@voteme_api');
Route::post('/v1/campaigns', 'API\AuthController@campaign_api');
Route::post('/v1/confirm','API\AuthController@confirm');
Route::post('/v1/reset','API\AuthController@reset');
Route::post('/v1/profile', 'API\AuthController@profile');
Route::post('/v1/payment','API\AuthController@donation');
Route::post('/v1/editProfile', 'API\AuthController@updateProfile');
Route::get('/v1/candidates', 'API\AuthController@getAll');
Route::post('/v1/talktome', 'API\AuthController@postTalk');
Route::post('/v1/search', 'API\AuthController@search');

Route::post('/user/register','AuthController@regVotee');




