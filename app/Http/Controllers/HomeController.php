<?php

namespace App\Http\Controllers;
use App\User;
use App\Parking;
use App\Log;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Auth;
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
      $d = Parking::all();
      return view('/search',['details'=>$d,'query'=>'']);
    }
    public function sendMailForm(){
      $admin = User::where('level','LIKE','admin')->get()[0];
      return view('/contact',['admin'=>$admin]);
    }
    public function sendMail(Request $request){
      $detail = $request->input('description');
      $name = $request->input('name');
      $email = $request->input('emailUser');
      $emailAdmin = $request->input('email');
       Mail::to($emailAdmin)->send(new OrderShipped($detail,$email,$name));
       $log = new Log();
       if (Auth::check()){
          $log->id_user = Auth::user()->id;
       }

       else{
         $log->id_user = '2';
       }
       $users = User::all()->pluck('name','id');
       $log->description = $users[$log->id_user].' has contact us from the web : '.$detail;
       $log->save();
       return redirect()->back();
    }
}
