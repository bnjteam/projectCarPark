<?php

namespace App\Http\Controllers;
use App\User;
use App\Location;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function search(){
      $locationWord = Input::get ( 'search' );
      $location = Location::where('location','LIKE','%'.$locationWord.'%')->orWhere('address','LIKE','%'.$locationWord.'%')->get();
      if(count($location) > 0)
          return view('/search')->withDetails($location)->withQuery ( $locationWord );
      else return view ('/search')->withMessage('No Details found. Try to search again !');
    }
    public function show_search(){
      return view('/search');
    }
}
