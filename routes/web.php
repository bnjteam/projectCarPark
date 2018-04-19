<?php

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home2');
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

Route::get('/home', 'HomeController@index')->name('home');
