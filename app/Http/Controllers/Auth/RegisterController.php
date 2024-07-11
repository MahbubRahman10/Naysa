<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\EmailVerification;
use App\User;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {

        // User Register validation
        $validator = $this->validator($request->all());
        if ($validator->fails()) 
        {
           return Redirect()->back()->withErrors($validator)->withInput($request->all);
        }
       
        // I don't know what I said in the last line! Weird!
        // DB::beginTransaction();
        try
        {
            $user = $this->create($request->all());
            // After creating the user send an email with the random token generated in the create method above
            $email = new EmailVerification(new User(['email_token' => $user->email_token, 'name' => $user->name]));
            Mail::to($user->email)->send($email);
            
            // // Generate Message
            // $message = "Your Oisilab Confirmation Activation Code is ".$user->email_token;
            // // Send Activation Code to user
            // onnorokom_sms(['message' => $message, 'mobile_number' => $user->phone]);

            DB::commit();

            return redirect()->to("/register/email-confirm");
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back();
        }
    }

    protected function validator(array $data)
    {   
        return Validator::make($data, [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|numeric|digits:11',
            'password' => 'required|string|min:6|confirmed',
            // 'firstname' => 'required|string|max:255',
            // 'lastname' => 'required|string|max:255',
            'address' => 'required|string',
            'city' => 'required|string|max:255',
            'postal' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {   
        return User::create([
            'name' => ucfirst($data['username']),
            'email' => $data['email'],
            // 'firstname' => $data['firstname'],
            // 'lastname' => $data['lastname'],,
            'phone' => "+88".$data['phone'],
            'address' => $data['address'],
            'city' => $data['city'],
            'postal' => $data['postal'],
            'country' => $data['country'],
            'password' => bcrypt($data['password']),
            'email_token' => substr(str_shuffle("0123456789"), 0, 5),
        ]);
    }

    // Verified the User
    public function verify($token)
    {
       $user = User::where('email_token',$token)->first();
       if ($user == null) {
           return Redirect('/');
       }
        User::where('email_token',$token)->firstOrFail()->verified();
        Auth::login($user);
        return redirect('/'); 
    }
}
