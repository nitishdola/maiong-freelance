<?php

namespace App\Http\Controllers\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;
use DB, Validator, Redirect, Auth, Crypt, Response, Mail;

use App\User;
class UserAuthApiController extends Controller
{
    public function userRegister(Request $request) {
    	$data = $request->all();
    	$json = [];

    	$errors = [];

    	$validator = Validator::make($data, User::$rules);
    	if ($validator->fails()) {

    		foreach ($validator->messages()->getMessages() as $field_name => $messages)
		    {
		        $errors[] = $messages;
		    }

		    $json['success'] 	= false;
        	$json['errors'] 	= true;
        	$json['error_messages'] 	= $errors;
        	$json['message'] 	= 'Unable to create user';
    	}else{
    		$data['password'] = bcrypt($request->password);
        	$data['email_confirmation_code'] = Helper::generateRandomString(10);
        	
    		if(User::create($data)) {
	            //SEND MAIL
	            Mail::send('mails.confirmation', $data, function($message) use($data) {
	                $message->to($data['email']);
	                $message->subject('Maiong Registraion Email Confirmation');
	            });    

	            $json['success'] 	= true;
	        	$json['errors'] 	= false;
	        	$json['message'] 	= 'User created successfully ! Verification link has been send to registered email, please verify your email ';
	            
	        }else{
	        	$json['success'] 	= false;
	        	$json['errors'] 	= false;
	        	$json['message'] 	= 'Unable to create user. Please try again';
	        }
    	}
    	

	    return json_encode($json);
    }

    public function userLogin(Request $request) {
        $json = [];
    	if (auth()->attempt($request->except('_token')))
        {
            $json['success']        = true;
            $json['user_info']      = Auth::user();
        }else{
            $json['success']        = false;
        }
        return json_encode($json);
    }

    public function userLogout(Request $request) {
        Auth::logout();
        return true;
    }

    public function todo() {
        return 'TODO';
    }
}
