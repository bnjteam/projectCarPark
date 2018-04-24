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
Route::post('/search','HomeController@search');
Route::get('/search', 'HomeController@show_search');
Route::put('/home/{id}','SettingController@update');
Route::get('/profile', 'SettingController@index');
Route::get('/userManager', 'UsersManagerController@index');
Route::get('/userManager/show/{user}', 'UsersManagerController@show');
Route::get('/userManager/setting/{user}', 'UsersManagerController@edit');
Route::put('/userManager/update/{user}','UsersManagerController@update');
Route::DELETE('/userManager/suspend/{user}','UsersManagerController@destroy');
<<<<<<< HEAD
Route::get('/changePW', 'ChangePasswordController@index');
Route::put('/change/{id}','ChangePasswordController@update');
=======
>>>>>>> 15b1cd040808f0129325f8994c5bd9d4ddaa1b4f
