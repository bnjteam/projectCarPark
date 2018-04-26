<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Log;
use Illuminate\Support\Facades\Auth;



class PaymentsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($object)
    {
        // dd('asd');
        return view('payments.payments',['object'=> $object]);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('payments.payments', ['user'=>$user]);
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
        /**
        $users->type=$request->input('package');
        $users->save();
       /**{{-- $log = new Log();
        $log->description = Auth::user()->name.' has paymented';
        $log->location = '';
        $log->save();--}}**/
        $request->validate([
            'card'=>'required|digits:16|numeric',
            'month'=>'required|between:1,12|numeric',
            'year'=>'required|digits:4|numeric',
            'cvv'=>'required|digits:3|numeric',
            ]);
        $package = $request->input('package');
        $log = new Log();
            $log->id_user = Auth::user()->id;
            $users = User::all()->pluck('name','id');

            $log->description = $users[$log->id_user]." buy reserve's package ".$package;
            $log->save();

        
        return view('payments.complete');
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