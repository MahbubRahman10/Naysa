<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Order;
use App\User;
use App\Wishlist;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
 	public function contactinformation(Request $request)
 	{
 		// Validation
 		$data = Input::all();                 
 		$rules=array(
 			'firstname' => 'required',
 			'lastname' => 'required',
 			'phone' => 'required', 
 		);
 		$valid=Validator::make($data,$rules);
 		if($valid->fails()){
 			return Redirect()->back()->withErrors($valid);
 		}

 		$id = Auth::user()->id;
 		$user = User::find($id);

 		$user->firstname = $request->firstname;
 		$user->lastname = $request->lastname;
		$user->company = $request->company;
		$user->phone = $request->phone;
 		$user->fax = $request->fax;

 		$user->save();

 		return redirect()->back()->with('message', 'Your account successfully changed');

 	}

 	public function updateinfo(Request $request)
 	{
 		// Validation
 		$data = Input::all();                 
 		$rules=array(
 			'name' => 'required',
 			'phone' => 'required',
 		);
 		$valid=Validator::make($data,$rules);
 		if($valid->fails()){
 			return Redirect()->back()->withErrors($valid);
 		}

 		$id = Auth::user()->id;
 		$user = User::find($id);
 		$user->name = $request->name;
 		$user->phone = $request->phone;

		$user->save();

		return redirect()->back()->with('message', 'Your Information updated successfully');


 	}

 	public function updateaddressbook(Request $request)
 	{
 		// Validation
 		$data = Input::all();                 
 		$rules=array(
 			'address' => 'required',
 			'city' => 'required',
 			'postal' => 'required',
 			'country' => 'required'  
 		);
 		$valid=Validator::make($data,$rules);
 		if($valid->fails()){
 			return Redirect()->back()->withErrors($valid);
 		}

 		$id = Auth::user()->id;
 		$user = User::find($id);
 		if ($request->mobile) {
 			$user->phone2 = $request->mobile;
 		}

 		$user->address = $request->address;
 		$user->city = $request->city;
		$user->postal = $request->postal;
		$user->country = $request->country;

		$user->save();

		return redirect()->back()->with('message', 'Your Address Book updated successfully');


 	}

public function updatepassword(Request $request)
 	{
 		$validator = Validator::make($request->all(), [
 			'oldpassword' => ' required',
 			'password' => 'required|string|min:6|confirmed',
 		]);
      	// Validation
 		if ($validator->fails()) {
 			return back()
 			->withErrors($validator)
 			->withInput();
 		}

 		$current_password = Auth::User()->password;
 		if(Hash::check($request->oldpassword, $current_password))
 			{           
 				$user_id = Auth::User()->id;                       
 				$user = User::find($user_id);

 				$user->password =bcrypt($request->password);
 				$user->save();
 				return redirect()->back()->with('message', 'Your password has been changed successfully!');
 			}
 			else{
 				$validator->errors()->add('oldpassword', 'Please enter the correct password');
 				return back()
 				->withErrors($validator)
 				->withInput();
 			}


 	}


}
