<?php

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/setting', function () {
    return view('setting');
});
Route::get('/check','ParkingsController@checkreserve');
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::post('/search','HomeController@search');
Route::get('/search', 'HomeController@show_search');
Route::put('/profile/update','SettingController@update');
Route::get('/profile', 'SettingController@index');
Route::get("/profile/show/{user}", 'SettingController@show');
Route::get('/userManager', 'UsersManagerController@index');
// Route::get('/userManager', function(){
//   if (Gate::allows('index-userManager',Auth::user())){
//     $users = User::all();
//     return view('userManager.index',['users' => $users]);
//   }
//   else{
//     return 'asd';
//   }
// });


Route::get('/userManager/show/{user}', 'UsersManagerController@show');
Route::get('/userManager/setting/{user}', 'UsersManagerController@edit');
Route::get('/userManager/logs/{user}', 'LogController@show');
Route::put('/userManager/update/{user}',['as'=>'update','uses'=>'UsersManagerController@update']);
Route::DELETE('/userManager/suspend/{user}','UsersManagerController@destroy');
Route::get('/changePW', 'ChangePasswordController@index');
Route::put('/change/{id}','ChangePasswordController@update');
Route::get('/userManager/logs/', 'LogController@showAllLog');


Route::get('/parkings/info','ParkingsController@InfoParking');
Route::delete('/parkings/info/{current_map}','ParkingsController@deletereserve')->where('id','[0-9]+');


Route::put('/parkings/updatemap','ParkingsController@updatemap');
Route::get('/parkings/{parking}/addcarpark', 'ParkingsController@addcarpark');
Route::get('/parkings/{parking}/edit','ParkingsController@edit');
Route::get('/parkings', 'ParkingsController@index');
Route::get('/parkings/create', 'ParkingsController@create');
Route::get('/parkings/{parking}','ParkingsController@show')->where('id','[0-9]+');
Route::post('/parkings', 'ParkingsController@store');
Route::put('/parkings/{parking}','ParkingsController@update')->where('id','[0-9]+');
Route::delete('/parkings/{parking}','ParkingsController@destroy')->where('id','[0-9]+');
Route::get('/parkings', 'ParkingsController@index');




Route::put('/parkings/{parking}/addphoto','ParkingsController@updatephoto')->where('id','[0-9]+');
Route::delete('/photoslocations/{photoslocation}','ParkingsController@destroyphoto')->where('id','[0-9]+');
Route::get('/parkings/{parking}/edit/map','ParkingsController@editphoto');
Route::put('/parkings/{parking}/updatecarpark','ParkingsController@updatecarpark')->where('id','[0-9]+');

Route::get('/contact','HomeController@sendMailForm');
Route::post('/contact','HomeController@sendMail');
Route::get('/package', 'PackagesController@index');
// Route::get('/payments/{object}', function () {
//     return view('payments.payments');
// });
Route::get('/payments/{object}', 'PaymentsController@index');
Route::post('/payments','PaymentsController@store');
Route::put('/payments/{id}','PaymentsController@update');

Route::get('register_owner','UsersManagerController@createOwner');
Route::get('/register_owner/payments/{object}', 'PaymentsController@index');
Route::put('/register_owner/payments/{object}', 'PaymentsController@update');

Route::get('/readQRcode/{token}','ParkingsController@readQRcode');
Route::get('/qr-code', 'ParkingsController@genQRcode');
