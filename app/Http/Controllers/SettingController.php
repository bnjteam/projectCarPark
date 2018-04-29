<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
use App\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('/profile',['user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      if (\Gate::allows('index-profile',\Auth::user())){
      return View('/profile',['user'=>$user]);
    }else {
      return view('/denieViews.denie');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'fileToUpload' =>'file|mimes:jpeg,bmp,png',
            'password' => 'required|string|min:6|confirmed'

            ]);

        $user = Auth::user();
        //dd($user->avatar!=null);
        if (Hash::check($request->input('password'), $user->password)) {
          if($request->fileToUpload!=null){
            $path = $request->fileToUpload->store('/public/photos');
            $user->avatar = '/storage/photos/'.basename($path) ;

          }elseif ($user->avatar!=null) {
            $user->avatar = $user->avatar ;
          }
          else{
          $user->avatar = '/storage/photos/avatar123.png' ;
        }
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        //$user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        $log = new Log();
        if (Auth::check()){
            $log->id_user = Auth::user()->id;
         }

         else{
           $log->id_user = '2';
         }
         $users = User::all()->pluck('name','id');
         $log->description = "user ".$log->id_user.' setting user';
         $log->save();
            return View('/profile',['user'=>$user]);
         }else{
            return view('/setting',['aleartMesg'=>'Your password are wrong.']);
         }



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
