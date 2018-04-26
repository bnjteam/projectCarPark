<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Log;
use Illuminate\Support\Facades\Auth;



class PaymentsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
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
       **/
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
        



            $user = Auth::user();
            $user->type = $package;

            // $user->start_date_package = date('Y-m-d H:i:s');
            $time = Carbon::now();
            $user->start_date_package = $time->toDateTimeString();

            if ($user->type=="small"){
              $month = 4;
              $user->end_date_package = $time->addMonths($month)->toDateTimeString();
            }
            elseif ($user->type=="medium") {
              $month = 8;
              $user->end_date_package = $time->addMonths($month)->toDateTimeString();
            }
            elseif ($user->type=="large") {
              $month= 12;
              $user->end_date_package = $time->addMonths($month)->toDateTimeString();
            }
            elseif ($user->type=="daily") {
              $day = 1;
              $user->end_date_package = $time->addDays($day)->toDateTimeString();
            }
            elseif ($user->type=="weekly") {
              $day = 7;
              $user->end_date_package = $time->addDays($day)->toDateTimeString();
            }
            elseif ($user->type=="monthly") {
              $day = 30;
              $user->end_date_package = $time->addDays($day)->toDateTimeString();
            }
            $user->save();
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
