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


//home route
Route::get('/', 'HomeController@index');

Route::get('/dashboard', 'HomeController@dashboard')->name('home');

Route::get('/configuration', 'HomeController@showConfiguration');




//session routes

Route::get('/login', 'SessionController@create')->name('login');

Route::post('/session/store', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');



//campaigns routes

Route::get('/campaign', 'SMSCampaignController@index');

Route::get('/campaign/sms/', 'SMSCampaignController@index');

Route::get('/campaign/sms/create', 'SMSCampaignController@create');

Route::post('/campaign/sms/store', 'SMSCampaignController@store');


//sms campaign report

Route::get('/campaign/sms/report', 'ReportController@index');



//templates
Route::get('/sms/templates', 'SMSTemplateController@index');

Route::post('/sms/template/create', 'SMSTemplateController@store');



//lists routes

Route::get('/list', 'DistributionListController@index');

Route::get('/list/{list}', 'DistributionListController@show')->where('list', '\d+');

Route::get('/list/create', 'DistributionListController@create');

Route::post('/list/store', 'DistributionListController@store');

Route::delete('/list/{list}/delete', 'DistributionListController@delete')->where('list', '\d+');

Route::patch('/list/{list}/update', 'DistributionListController@update')->where('list', '\d+');



//contact routes

Route::get('/contact', 'ContactController@index');

//Route::get('/contact/{contact}', 'ContactController@show')->where('contact', '\d+');;

Route::post('/contact/store', 'ContactController@store');

Route::get('/contact/create', 'ContactController@create');

//Route::delete('/contact/{contact}/delete', 'ContactController@delete')->where('contact', '\d+');

//Route::patch('/contact/{contact}/update', 'ContactController@update')->where('contact', '\d+');;



//company

Route::get('/company', 'CompanyController@index');

//Route::get('/company/{company}', 'CompanyController@show');

Route::get('/company/create', 'CompanyController@create');

Route::post('/company/store', 'CompanyController@store');

Route::get('/company/{company}/delete', 'CompanyController@delete');

Route::get('/company/{company}/update', 'CompanyController@update');



//User

Route::get('/user/create', 'UserController@create');

Route::get('/user/{user}', 'UserController@show');

Route::post('/user/store', 'UserController@store');

Route::post('/user/changepassword', 'UserController@changepassword');

Route::post('/user/{user}/update', 'UserController@update');

Route::post('/user/{user}/delete', 'UserControllre@destroy');


//Subscription
Route::get('/subscription', 'SubscriptionController@dashboard');

Route::post('/subscription/create', 'SubscriptionController@create');

Route::post('/subscription/request', 'SubscriptionController@sendSubscriptionRequest');

Route::get('/subscription/validate', 'SubscriptionController@validatePanel');

Route::post('/subscription/approve', 'SubscriptionController@approve');

Route::post('/subscription/decline', 'SubscriptionController@decline');




