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

//Route::get('/', function () {
//    return view('welcome');
//});
//Route::get('/','FrontendController@index');
//Route::post('/','FrontendController@index');

Route::post('/contact','ContactFormController@store');
Route::get('/admin','BackendController@index');

Route::resource('/','FrontendController');
Route::resource('services','ServicesController');
Route::resource('categories','CategoryController');
Route::resource('portfolios','PortfolioController');
Route::resource('teams','TeamController');
Route::resource('blog','BlogController');
Route::resource('testimonials','TestimonialController');
Route::get('unpublished-service/{id}','ServicesController@unpublished')->name('unpublished-service');
Route::get('published-service/{id}','ServicesController@published')->name('published-service');
Route::get('unpublished-portfolio/{id}','PortfolioController@unpublished')->name('unpublished-portfolio');
Route::get('published-portfolio/{id}','PortfolioController@published')->name('published-portfolio');
Route::get('unpublished-team/{id}','TeamController@unpublished')->name('unpublished-team');
Route::get('published-team/{id}','TeamController@published')->name('published-team');
