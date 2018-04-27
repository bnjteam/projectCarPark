<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request ;
use App\User;
use App\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['is_enabled'] = 1;
        if (count(User::all()->where('email','LIKE',$request->email))){
          $log = new Log();
          $email = $request->email;
           $users = User::all()->pluck('id','email');
           $log->id_user = $users[$email];
           $users = User::all()->pluck('name','email');
           $log->description = $users[$email].' has login';
           $log->save();
           $u = User::all()->where('id','LIKE',$log->id_user)->first();
           // dd($u->level!="admin" , $u->end_date_package!=null,$u);
           if ($u->level!="admin" && $u->end_date_package!=null){
             $time = Carbon::now();

             if ($time->gt($u->end_date_package))
             {
               // dd($u->end_date_package,$time->toDateTimeString(),'expired');
               $log = new Log();
               $email = $request->email;
                $users = User::all()->pluck('id','email');
                $log->id_user = $users[$email];
                $users = User::all()->pluck('name','email');
                $log->description = $users[$email]." have expired package's ".$u->type;
                $log->save();
               $u->level='guest';
               $u->type="none";
               $u->end_date_package=null;
               $u->start_date_package=null;
               $u->save();
             }
             else{
               // dd($u->end_date_package,$time->toDateTimeString(),'have a time');
             }
           }

        }
        return $credentials;
    }
    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
        $user = \App\User::where($this->username(), $request->{$this->username()})->first();

        if ($user && \Hash::check($request->password, $user->password) && $user->is_enabled != 1) {
            $errors = [$this->username() => 'Your account is suspended.'];
        }
        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }
}
