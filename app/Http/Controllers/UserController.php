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
