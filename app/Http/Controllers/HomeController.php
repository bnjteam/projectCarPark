<?php

namespace App\Http\Controllers;
use App\User;
use App\Parking;
use App\Log;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use App\Photolocation;
use App\Current_map;
use App\Map;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends Controller
{
    private $filter;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->filter= ['location'=>'Location','address'=>'Address'];
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',['filters'=>$this->filter]);
    }
    public function search(){
      $locationWord = Input::get ( 'search' );
      if ($locationWord==null){
        $locationWord='';
      }
      if (Input::get('filter')=="location"){
          $location = DB::table('parkings')->where('location','like','%'.$locationWord.'%')->paginate(6);


      }
      else{
          $location = DB::table('parkings')->where('address','like','%'.$locationWord.'%')->paginate(6);

      }
      // dd($location);
      if(count($location) > 0)
      {
        $start = 1;
        return view('/search',['start'=>$start,'details'=>$location,'query'=>$locationWord,'filters'=>$this->filter]);
      }
      else {
        return view ('/search',['message'=>'No Details found. Try to search again !','filters'=>$this->filter]);
      }
    }
    public function show_search(){
      $d = DB::table('parkings')->paginate(6);
      return view('/search',['start'=>1,'details'=>$d,'query'=>'','filters'=>$this->filter]);
    }
    public function sendMailForm(){
      $admin = User::where('level','LIKE','admin')->get()[0];
      return view('/contact',['admin'=>$admin]);
    }
    public function sendMail(Request $request){
      $request->validate([
          'name'=>'required',
          'emailUser'=>'required',
          ]);
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
       $log->description = "user ".$log->id_user.' has contact us from the web : '.$detail;
       $log->save();
       return redirect()->back();
    }
    public function InfoParking(){

        $cur_map = Current_map::all()->where('id_user','LIKE',Auth::user()->id)->first();
        if ($cur_map!=null){
          $map = Map::all()->where('id','LIKE',$cur_map->id)->first();
          $photo = Photolocation::all()->where('id','LIKE',$map->id_photo)->first();
          $parking = Parking::all()->where('id','LIKE',$photo->id_parking)->first();
          $timeout = Carbon::parse($cur_map->created_at)->addMinutes(30);
            return view('/park.infoparking',['parking'=>$parking,'timeOut'=>$timeout]);
        }
        else{
            return view('/park.infoparking');
        }

    }


}
