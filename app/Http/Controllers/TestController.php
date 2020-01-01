<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class TestController extends Controller
{


    public function loginVerify(Request $request) {
    	$request = $request->user;
    	// dd($request);
    	// dd($request["email"]);
    	$email = $request["email"];
    	$password = $request["password"];

    	$user = User::where("email", $email)->first();
    	// dd($user);
    	if($user) {


	    	$hased_password = $user->password;
	    	$flag = Hash::check($password,$hased_password);
	    	if($flag) {
	    		$userObj = User::all();
				$returnHTML = view('home')->with('user', $userObj)->render();
				return response()->json(array('html'=>$returnHTML));  		
	    	}
	    	else {
				$returnHTML = view('invalid')->render();
				return response()->json(array('html'=>$returnHTML)); 
	    	}

    	}
    	else {

			$returnHTML = view('invalid')->render();
			return response()->json(array('html'=>$returnHTML));    		
    	}

    }

}
