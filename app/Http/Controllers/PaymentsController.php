<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use App\Log;
use App\Package_user;
use App\Package;
use App\Payment;
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
          if (\Gate::allows('index-payments',$object)){
            return view('payments.hasRegisted');
          }

        else{
        return view('payments.payments',['object'=> $object]);
      }
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
        $request->validate([
            'card'=>'required|digits:16|numeric',
            'month'=>'required|between:1,12|numeric',
            'year'=>'required|digits:4|numeric',
            'cvv'=>'required|digits:3|numeric',
            ]);
        $package = $request->input('package');
            $user = Auth::user();
            $user->type = $package;
            $time = Carbon::now();
            $user->start_date_package = $time->toDateTimeString();

            if ($user->type=="small"){
              $month = 4;

            }
            elseif ($user->type=="medium") {
              $month = 8;
            }
            elseif ($user->type=="large") {
              $month= 12;
            }
            elseif ($user->type=="daily") {
              $day = 1;

            }
            elseif ($user->type=="weekly") {
              $day = 7;

            }
            elseif ($user->type=="monthly") {
              $day = 30;


            }
            if (isset($day))
            {
              $user->end_date_package = $time->addDays($day)->toDateTimeString();
              $user->level = "member";

            }
            else{
              $user->end_date_package = $time->addMonths($month)->toDateTimeString();
              $user->level = "parking_owner";
            }
            $user->save();
            $package = Package::all()->pluck('id','name');
            $package_user = new Package_user();
            $package_user->id_user = $user->id;
            $package_user->id_package = $package[$user->type];
            $package_user->numbers = 0;
            $package_user->save();

            $payment = new Payment();
            $payment->id_user = $user->id;
            $payment->id_package = $package[$user->type];
            $payment->save();
            if (isset($day))
            {
              $user->end_date_package = $time->addDays($day)->toDateTimeString();
              $log = new Log();
                 $log->id_user = Auth::user()->id;
              $users = User::all()->pluck('name','id');
              $log->description = "user ".$log->id_user.' buy package '.$user->type;
              $log->save();

              return view('payments.complete');
            }
            else{
              $user->end_date_package = $time->addMonths($month)->toDateTimeString();
              $log = new Log();
                 $log->id_user = Auth::user()->id;
              $users = User::all()->pluck('name','id');
              $log->description = "user ".$log->id_user.' buy package '.$user->type;
              $log->save();
              return view('registerOwner.success',['user'=>$user]);
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
