<?php

namespace App\Http\Controllers;

use Illuminate\Cache\delete;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Contact;

class ContactController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // show Contact Page
    public function index()
    {
    	return view('contact.contact');
    }

    // Store Contact Data
    public function create(Request $request)
	{
 		// Validation
		$data = Input::all();                 
		$rules=array(
			'name' => 'required',
			'email' => 'required', 
			'message' => 'required', 
		);
		$valid=Validator::make($data,$rules);
		if($valid->fails()){
			return Redirect()->back()->withErrors($valid);
		}
		$contact = new Contact();
		$contact->name = $request->name;
		$contact->email = $request->email;
		$contact->telephone = $request->telephone;
		$contact->message = $request->message;

		$contact->save();

		return redirect('contact' . "/#contacts")->with('message', 'Thank you for your Message.');   
	}
}
