<?php

namespace App\Http\Controllers\REST\Profile\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Helper;
use DB, Validator, Redirect, Auth, Crypt;

use App\Models\Profile\UserProfile, App\Models\Profile\ProfileImage, App\Models\Profile\ProfileLocation; 

class ProfileController extends Controller
{
    public function viewMyProfiles(Request $request) {
    	$user_id = $request->user_id;
    	$user_active_profiles = UserProfile::where('user_id', $user_id)->where('status',1)->count();
    	$user_disabled_profiles = UserProfile::where('user_id', $user_id)->where('status',0)->count();

    	return json_encode(['active_profiles' => $user_active_profiles, 'disabled_profiles' => $user_disabled_profiles]);
    }
}
