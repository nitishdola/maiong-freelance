<?php

namespace App\Http\Controllers\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
class UsersController extends Controller
{
    public function deactivateUser(Request $request) {
    	
    }

    public function view(Request $request) {
    	if($request->user_id):
	    	$user_id = $request->user_id;
	    	return User::with('skills', 'certificates')->where('id', $user_id)->first();
    	endif;

    }
}
