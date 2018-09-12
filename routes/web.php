<?php

Auth::routes();

Route::view('/home', 'frontend.home');
Route::get('/home', 'HomeController@index')->name('home');

require_once('admin.php');
require_once('frontend.php');

require_once('testing.php');
