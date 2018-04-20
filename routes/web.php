<?php
use App\User;
use App\Location;
use Illuminate\Support\Facades\Input;
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
Route::any('/search',function(){
    $locationWord = Input::get ( 'search' );
    $location = Location::where('location','LIKE','%'.$locationWord.'%')->orWhere('address','LIKE','%'.$locationWord.'%')->get();
    if(count($location) > 0)
        return view('home')->withDetails($location)->withQuery ( $locationWord );
    else return view ('home')->withMessage('No Details found. Try to search again !');
});
Route::put('/home/{id}','SettingController@update');
Route::get('/profile', function () {
    return view('/profile');
});
