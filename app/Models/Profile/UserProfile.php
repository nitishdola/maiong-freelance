<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = array('user_id', 'profile_title', 'slug', 'profile_description', 'category_id', 'package_description', 'package_amount');
	protected $table    = 'user_profiles';
    protected $guarded  = ['_token'];

    public static $rules = [
        'user_id'   			=>  'required|exists:categories,id',
    	'profile_title' 		=>  'required|max:255|unique:user_profiles', 
    	'slug'  				=>  'required|max:255|unique:user_profiles',
    	'profile_description' 	=>  'required|min:30',
    	'category_id' => 'required|exists:categories,id',
    	'package_description' 	=> 'required',
    	'package_amount' 		=> 'required',
    ];
}
