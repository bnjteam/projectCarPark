<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
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
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'fileToUpload' =>'required|image|file',
            'password' => 'required|string|min:6|confirmed']);

        $path = $request->fileToUpload->store('/public/photos');
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        //$user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->avatar = '/storage/photos/'.basename($path) ;
        $user->save();
    
        return view('/profile',['user'=>$user]);
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
