<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPassword;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.reset');
    }

    public function sendPasswordResetmail(Request $request)
    {
        $data = Input::all();                 
        $rules=array(
            'email' => 'required|email',  
            );
        $valid=Validator::make($data,$rules);
        if($valid->fails()){
            return Redirect()->back()->withErrors($valid);
        }

        $user = User::where('email','=', $request->email)->first();

        if ($user == null) {
            return Redirect::back()->withInput()->withErrors(array('email' => 'This email is not found'));
        }
        else{
            $token = $this->token();
            $user->email_token = $token;
            $user->save();

            $email = new ResetPassword(new User(['email_token' => $user->email_token, 'name' => $user->name]));
            Mail::to($user->email)->send($email);

            DB::commit();

            return redirect()->back()->with('status', 'We have send password reset link to your email.');
        }



    }

    public function token() {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); 

        for ($i=0; $i < 30; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }
        return $token;
    }


}
