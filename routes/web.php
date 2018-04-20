<?php

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('home');
});
Route::get('/search', function () {
    return view('search');
});
Route::get('/setting', function () {
    return view('setting');
});
Route::get('/test', function () {
    return view('test');
});
Route::get('/park_reserve', function () {
    return view('park.reserve');
});
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::put('/home/{id}','SettingController@update');
Route::get('/profile', function () {
    return view('/profile');
});