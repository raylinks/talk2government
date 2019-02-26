<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

 //Auth
Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::get('/auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::get('/auth/register/reg','Auth\RegisterController@showRegistrationForm2');
Route::post('/auth/register/reg','Auth\RegisterController@updatePolitician');
Route::get('/auth/logout', 'Auth\LoginController@logout');
Route::get('/auth/prompt', 'Auth\LoginController@prompt');
Route::post('/auth/register', 'Auth\RegisterController@Register');
Route::post('/auth/login', 'Auth\LoginController@login');
Route::get('/auth/setup', 'PagesController@setup');
Route::get('/forgotpass', 'Auth\ResetPasswordController@showResetForm');
Route::get('/politician/find/{lastname}','Auth\RegisterController@findPolitician');
Route::get('/politician/find/details/{id}','Auth\RegisterController@findPoliticianDetails');

//superadmin
Route::get('/admin/index', 'AdminController@index')->name('admin.index')->middleware('auth');
Route::get('/admin/login', 'AdminController@showLoginForm')->name('admin.login');
Route::get('/admin/register', 'AdminController@showRegistrationForm')->name('admin.register');
Route::get('/admin/billing','AdminController@billing')->name('admin.billings');
Route::get('/admin/billing/create', 'AdminController@createBilling')->name('admin.billings.create');
Route::get('/admin/billing/{id}/edit', 'AdminController@editBilling')->name('admin.billing.edit');
Route::get('/admin/billing/{id}/delete', 'AdminController@deleteBilling')->name('admin.billing.delete');
Route::get('/admin/forgot', 'AdminController@showResetForm');
Route::get('admin/logout','AdminController@logout');
Route::get('admin/user/create','AdminController@createUser');
Route::post('admin/user/create','AdminController@saveUser');
Route::get('/admin/user/{id}/edit','AdminController@userEdit')->name('admin.user.edit');
Route::get('/admin/user/{id}/activate', 'AdminController@toActivate')->name('admin.activate');
Route::get('admin/user/{id}/deactivate','AdminController@deactivate')->name('admin.deactivate');
Route::get('/admin/pay/{user_id}/{plan_id}', 'AdminController@showPayment');
Route::get('/admin/newsletter', 'AdminController@newslettersSubscribers');


Route::post('/admin/register', 'AdminController@register');
Route::post('admin/login', 'AdminController@login');
Route::post('/admin/billing/create','AdminController@createBill');
Route::post('/admin/billing/{id}/edit', 'AdminController@updateBilling');
Route::post('/admin/user/{id}/edit','AdminController@userUpdate');
Route::post('/admin/user/{id}/activate', 'AdminController@sendActivate');
Route::post('/admin/user/savePayment','AdminController@savePayment');

//Home
Route::get('/','EndusersController@index');
Route::get('/home', 'TasksController@home')->middleware('auth');
// Route::get('/', 'TasksController@home')->middleware('auth');

//Achievements
Route::get('/achievements', 'AchievementController@index')->middleware('auth');
Route::get('/achievements/{id}/update', 'AchievementController@edit')->middleware('auth');
Route::get('/achievements/{id}/delete', 'AchievementController@destroy')->middleware('auth');
Route::post('/achievements', 'AchievementController@create')->middleware('auth');
Route::post('/achievements/{id}/update', 'AchievementController@update')->middleware('auth');

//Manifestos
Route::get('/manifestos', 'ManifestoController@index')->middleware('auth');
Route::get('/manifestos/{id}/update', 'ManifestoController@edit')->middleware('auth');
Route::get('/manifestos/{id}/delete', 'ManifestoController@destroy')->middleware('auth');
Route::post('/manifestos/{id}/update', 'ManifestoController@update')->middleware('auth');
Route::post('/manifestos', 'ManifestoController@store')->middleware('auth');

//Vision
Route::get('/vision', 'VisionController@index')->middleware('auth');
Route::get('/vision/{slug?}/delete', 'VisionController@destroy')->middleware('auth');
Route::get('/vision/{slug?}/update', 'VisionController@edit')->middleware('auth');
Route::post('/vision/{slug?}/update', 'VisionController@update')->middleware('auth');
Route::post('/vision', 'VisionController@store')->middleware('auth');

//Mission
Route::get('/mission', 'MissionController@index')->middleware('auth');
Route::get('/mission/{id}/update', 'MissionController@edit')->middleware('auth');
Route::get('/mission/{id}/delete', 'MissionController@destroy')->middleware('auth');
Route::post('/mission/{id}/update', 'MissionController@update')->middleware('auth');
Route::post('/mission', 'MissionController@store')->middleware('auth');

//Campagnes
Route::get('/campagnes', 'CampaignController@index')->middleware('auth');
Route::get('/campagnes/{id}/update', 'CampaignController@edit')->middleware('auth');
Route::get('/campagnes/{id}/delete', 'CampaignController@destroy')->middleware('auth');
Route::post('/campagnes/{id}/update', 'CampaignController@update')->middleware('auth');
Route::post('/campagnes', 'CampaignController@store')->middleware('auth');

//Profile
Route::get('/profile', 'UserDetailController@index')->middleware('auth');
Route::get('/profile/{id}/edit', 'UserDetailController@edit')->middleware('auth');
Route::post('/profile/{id}/edit', 'UserDetailController@update')->middleware('auth');

//Charts
Route::get('/chart', 'TasksController@chart');
Route::get('/charts', 'PagesController@charts');
Route::get('/analytics/pie', 'PagesController@a_pie');

//Others
Route::get('/users/report', 'ResponseController@show')->middleware('auth');

//complains
Route::get('/complains', 'PagesController@complains')->middleware('auth');
Route::post('/complains', 'PagesController@complains_p')->middleware('auth');

//voteme
Route::get('/voteme', 'Vote_meController@index')->middleware('auth');
Route::post('/voteme', 'Vote_meController@store')->middleware('auth');

//donations
Route::get('/donations', 'ElectionController@donation')->middleware('auth');
Route::post('/donations', 'ElectionController@donation_p')->middleware('auth');

//Laravel Auth
Auth::routes();
Route::get('/home', 'TasksController@home')->middleware('auth');
//Route::get('/home', 'HomeController@index')->name('home');


//USERS INTEGRATION
Route::get('/user/index', 'EndusersController@index');
Route::get('/user/login', 'EndusersController@showLoginForm');
Route::post('/user/login', 'EndusersController@login');
Route::get('/user/register', 'EndusersController@register');
Route::post('/user/register', 'EndusersController@create');
Route::get('/user/talk', 'EndusersController@talk');
Route::get('/user/tktleader', 'EndusersController@tktleader');
Route::get('/user/talk2leader', 'EndusersController@talk2leader');
Route::get('/user/meet', 'EndusersController@meet');
Route::post('/user/meet', 'EndusersController@searchAndNewsletter');
Route::get('/user/fetchDetails/{id}','EndusersController@fetchstateDetails');
Route::get('/user/more/{id}', 'EndusersController@more')->name('politician.details');
Route::get('/user/pay/{id}','EndusersController@showPayment')->name('user.pay');
Route::get('/talk/to/us/{id}','EndusersController@talkToUs')->name('user.talkToUs');
Route::post('/talk/to/us/{id}','EndusersController@postTalk');
Route::get('/user/message','EndusersController@userMessage')->name('user.userMessage');
Route::post('/user/message','EndusersController@postMessage');
Route::get('/user/donate', 'EndusersController@userDonate');
Route::post('/user/donate/save', 'EndusersController@postDonate');
Route::get('/donate/pay', 'EndusersController@donatePay');


//FACEBOOK ROUTES
Route::get('facebook', function () {
    return view('facebook');
});
Route::get('auth/facebook', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\FacebookController@handleFacebookCallback');

//GOOGLE ROUTES
Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');