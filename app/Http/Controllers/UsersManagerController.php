<?php

namespace App\Http\Controllers;

use App\User;
use App\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class UsersManagerController extends Controller
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
      if (\Gate::allows('index-userManagers')){
        $users = User::all();
        return view('userManager.index',['users' => $users]);
      }
      else{
          return view('/denieViews.denie');
      }
        // $users = User::all();
        // return view('userManager.index',['users' => $users]);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      if (\Gate::allows('index-userManagers',$user)){
        return view('userManager.show',['user' => $user]);
      }
      else{
          return view('/denieViews.denie');
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

      if (\Gate::allows('index-userManagers',$user)){
        $users = User::all();
        $level = ['admin'=>'Admin','member'=>'Member','guest'=>'Guest','parking_owner'=>'Parking Owner'];
        $type = ['none'=>'None','daily'=>'Daily','weekly'=>'Weekly','monthly'=>'Monthly','small'=>'Small','medium'=>'Medium','large'=>'Large'];
        return view('userManager.setting',['user'=>$user , 'level'=>$level,'type'=>$type,'users'=>$users]);
      }
        else{
            return view('/denieViews.denie');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            ['name' =>'required|min:4|max:255',
            'lastname' =>'required|min:4|max:255',
            'email' =>'required|email'
            ]
        );
        if ($request->fileToUpload!=null)
        {
          $path2 = $request->fileToUpload->store('/public/photos');
          $user->avatar = '/storage/photos/'.basename($path2) ;
        }
        $user->name =$request->input('name');
        $user->lastname =$request->input('lastname');
        $user->email =$request->input('email');

        $user->level =$request->input('level123');
        $user->type =$request->input('type');
        //$user->password = Hash::make($request->input('password')) ;
        $user->save();
        $log = new Log();
           $log->id_user = Auth::user()->id;
        $users = User::all()->pluck('name','id');
        $log->description = "user ".$log->id_user.' edit user id : '.$user->id;
        $log->save();
        return redirect('/userManager/show/'.$user->id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      if (\Gate::allows('index-userManagers')){
        $log = new Log();
           $log->id_user = Auth::user()->id;
        $users = User::all()->pluck('name','id');

        if($user->is_enabled == 1){
            $user->is_enabled = 0;
            $log->description = "user ".$log->id_user.' suspend '.$user->name;

        }elseif($user->is_enabled==0){
            $user->is_enabled = 1;
            $log->description = "user ".$log->id_user.' active '.$user->name;
        }
        $user->save();

        $log->save();

        return redirect('/userManager');
      }else{
            return view('/denieViews.denie');
        }

    }
    public function createOwner(){


      return view('registerOwner/register-owner');
    }
}
