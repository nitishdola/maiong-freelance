<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileLocation extends Model
{
    protected $fillable = array('user_profile_id', 'latitude', 'longitude', 'name');
	protected $table    = 'profile_locations';
    protected $guarded  = ['_token'];

    public static $rules = [
        'user_profile_id'   	=>  'required|exists:user_profiles,id',
    	'latitude' 				=>  'required', 
    	'longitude'  			=>  'required',
    	'name' 					=>  'required|min:4',
    ];
}
