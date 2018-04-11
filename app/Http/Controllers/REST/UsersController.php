<?php

namespace App\Http\Controllers\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User, App\Models\User\UserSkill, App\Models\User\UserCertificate;

use DB, Validator, Redirect, Auth, Crypt, Hash, Helper;

class UsersController extends Controller
{
    public function userMoodChange(Request $request) {
    	if($request->user_id):
	    	$user_id 	= $request->user_id;
	    	$mood 		= $request->mood;

	    	$user 		= User::find($user_id);

	    	$user->is_user_offline = $mood;
	    	if($user->save()) {
	    		$json_return['error']	= false;
			    $json_return['mood'] 	= (int)$mood;
	    	}else{
	    		$json_return['error']	= true;
			    $json_return['mood'] 	= $user->is_user_offline;
	    	}

	    	return json_encode($json_return);
    	endif;
    }

    public function view(Request $request) {
    	if($request->user_id):
	    	$user_id = $request->user_id;
	    	return User::with('skills', 'certificates')->where('id', $user_id)->first();
    	endif;

    }

    public function updateSkills(Request $request) {

    	$json_return = [];
    	$json_return['error'] = false;
    	$json_return['success'] = 'Skills Updated !';
    	if($request->user_id):
    		if($request->skills):
    			$skills = $request->skills;
    			$skills_array = json_decode($skills);

    			foreach($skills_array as $skill): 
	    			$data = [];
	    			$data['user_id'] 	= trim($request->user_id);
	    			$data['skill_id'] 	= $skill->id;

	    			$validator = Validator::make($data, UserSkill::$rules);
			        
			        if($validator->fails()) {
			            foreach ($validator->messages()->getMessages() as $field_name => $message)
			            {
			                $json_return['error'] = true;
			                $json_return['errors'][] = $message;
			            }
			            return json_encode($json_return);
			        }else{
			        	//check if skill exists
			        	$skill_check = UserSkill::where(['skill_id' => $skill->id, 'user_id' => trim($request->user_id), 'status' => 1])->count();
			        	if(!$skill_check):
			            	$skill = UserSkill::create( $data );
			            endif;
			        }
			    endforeach;
    		else:
    			$json_return['error'] = true;
    			$json_return['errors'][] = 'Skill is empty !';
    			return json_encode($json_return);
    		endif;
    	else:
    		$json_return['error'] = true;
			$json_return['errors'][] = 'No user found !';
			return json_encode($json_return);
		endif;

		return json_encode($json_return);
    }


    public function updateCertificates(Request $request) {

    	$json_return = [];
    	$json_return['error'] = false;
    	$json_return['success'] = 'Certificates Updated !';
    	if($request->user_id):
    		if($request->certificates):
    			$certificates = $request->certificates;
    			$certificates_array = json_decode($certificates);

    			foreach($certificates_array as $certificate): 
	    			$data = [];
	    			$data['user_id'] 			= trim($request->user_id);
	    			$data['certificate_name'] 	= trim($certificate->name);

	    			$validator = Validator::make($data, UserCertificate::$rules);
			        
			        if($validator->fails()) {
			            foreach ($validator->messages()->getMessages() as $field_name => $message)
			            {
			                $json_return['error'] = true;
			                $json_return['errors'][] = $message;
			            }
			            return json_encode($json_return);
			        }else{
			        	//check if skill exists
			        	$cert_check = UserCertificate::where(['certificate_name' => trim($certificate->name), 'user_id' => trim($request->user_id), 'status' => 1])->count();
			        	if(!$cert_check):
			            	UserCertificate::create( $data );
			            endif;
			        }
			    endforeach;
    		else:
    			$json_return['error'] = true;
    			$json_return['errors'][] = 'Certificates is empty !';
    			return json_encode($json_return);
    		endif;
    	else:
    		$json_return['error'] = true;
			$json_return['errors'][] = 'No user found !';
			return json_encode($json_return);
		endif;

		return json_encode($json_return);
    }

    public function changePassword(Request $request) {

    	if($request->user_id):
    		$user_id = $request->user_id;

    		$user = User::find($user_id);

    		if($user):
	    		$old_password = $request->old_password;
	    		$new_password = $request->new_password;
	    		$confirm_password = $request->confirm_password;

	    		//check user

	    		$check = Hash::check($old_password, $user->password);
	    		if($check):
	    			if($new_password == $confirm_password):
	    				if($user->password = Crypt::encrypt($confirm_password)):
	    					$json_return['error'] = false;
	    					$json_return['success'] = 'Password Changed !';
	    				else:
	    					$json_return['error'] = true;
	    					$json_return['success'] = 'Unable to change password ! Please try again';
	    				endif;
	    			else:
	    				$json_return['error'] 	= true;
	    				$json_return['success'] = 'Password not matched !';
	    			endif;
	    		else:
	    			$json_return['error'] 	= true;
	    			$json_return['success'] = 'Invalid Password !';
	    		endif;
	    	else:
	    		$json_return['error'] 	= true;
	    		$json_return['success'] = 'Invalid User !';
	    	endif;
    	else:
    		$json_return['error'] 	= true;
    		$json_return['success'] = 'User ID is Empty !';
    	endif;

    	return json_encode($json_return);
    }

    public function sendOTPtoVerify(Request $request) {
    	$json_return = [];
    	if($request->user_id && $request->mobile_number):
    		$user_id = $request->user_id;
    		$user = User::find($user_id);

    		if($user):
	    		//check if already confirmed
	    		$chk = User::where(['id' => $user_id, 'mobile_number' => $request->mobile_number, 'is_mobile_number_confirmed' => 1])->count();
	    		if($chk):
	    			$json_return['error'] 	= true;
    				$json_return['message'] = 'Mobile number is already confirmed !';
    			else:
    				//save and send OTP

    				$otp 			= Helper::generateOTP();

    				$user->mobile_number_confirmation_code = $otp;
    				if($user->save()):

	    				$message 		= 'Use '.$otp.' as OTP to validate your mobile number in Maiong Freelance';
	    				$mobile_number 	= $request->mobile_number;

	    				if(Helper::sendSMS($message, $mobile_number)):
	    					$json_return['error'] 	= false;
    						$json_return['message'] = 'OTP sent successfully !';
	    				else:
	    					$user->mobile_number_confirmation_code = '';
	    					$user->save();

	    					$json_return['error'] 	= true;
    						$json_return['message'] = 'Unable to send OTP !';
	    				endif;
	    			else:
	    				$json_return['error'] 	= true;
    					$json_return['message'] = 'Unable to save OTP :(';
    				endif;
    			endif;
    		else:
    			$json_return['error'] 	= true;
    			$json_return['message'] = 'User not found ';
    		endif;
    	else:
    		$json_return['error'] 	= true;
    		$json_return['message'] = 'User/Mobile number invalid ';
    	endif;

    	return json_encode($json_return);
    }

    public function verifyOTP(Request $request) {
    	if($request->user_id && $request->otp && $request->mobile_number):
    		$user_id = $request->user_id;
    		$user = User::find($user_id);

    		if($user):
    			if($request->otp === $user->mobile_number_confirmation_code):
    				$user->is_mobile_number_confirmed = 1;
    				$user->mobile_number_confirmation_code = '';
    				$user->mobile_number = $request->mobile_number;

    				$user->save();

    				$json_return['error'] 	= false;
    				$json_return['message'] = 'OTP validated successfully !';
    			else:
    				$json_return['error'] 	= true;
    				$json_return['message'] = 'Invalid OTP !';
    			endif;
    		else:
    			$json_return['error'] 	= true;
    			$json_return['message'] = 'User not found ';
    		endif;
    	else:
    		$json_return['error'] 	= true;
    		$json_return['message'] = 'User/OTP number invalid ';
    	endif;

    	return json_encode($json_return);
    }
}
