<?php

namespace App\Http\Controllers;
use App\User;
use App\Parking;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
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
      if ($locationWord==null){
        $locationWord='';
      }
      $location = Parking::where('location','LIKE','%'.$locationWord.'%')->orWhere('address','LIKE','%'.$locationWord.'%')->get();
      if(count($location) > 0)
          return view('/search')->withDetails($location)->withQuery ( $locationWord );
      else return view ('/search')->withMessage('No Details found. Try to search again !');
    }
    public function show_search(){
      return view('/search');
    }
    public function sendMailForm(){
      $admin = User::where('level','LIKE','admin')->get()[0];
      return view('/contact',['admin'=>$admin]);
    }
    public function sendMail(Request $request){
      $detail = $request->input('description');
      $name = $request->input('name');
      $email = $request->input('emailUser');
       Mail::to($request->email)->send(new OrderShipped($detail,$email,$name));
       return redirect()->back();
    }
}
