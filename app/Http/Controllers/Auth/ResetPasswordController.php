<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }

    public function showResetForm($token)
    {   
        $user = User::where('email_token','=',$token)->first();
        if ($user == null) {
            return Redirect(''); 
        }
        else{
            return view('auth.passwords.email')->with('token',$token);   
        }
    }

    // Reset Password
    public function resetpass(Request $request)
    {
        $user = User::where('email_token','=',$request->email_token)->first();
        if ($user == null) {
            return Redirect(''); 
        }
        else{
            $data = Input::all();                 
            $rules=array(
                'password' => 'required|string|min:6|confirmed', 
                );
            $valid=Validator::make($data,$rules);
            if($valid->fails()){
                return Redirect()->back()->withErrors($valid);
            }  
            $user->password = bcrypt($request->password);
            $user->email_token = null;
            $user->save();
            Auth::login($user);
            return redirect('');
        }
    }
}
