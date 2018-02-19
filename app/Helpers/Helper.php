<?php

namespace App\Helpers;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Profile\UserProfile;
class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public static function loggedInClientInfo()
    {
    	if(Auth::user()) {
    		return Auth::user();	
    	}else{
    		return Redirect::route('user.login')->with(['message' => 'You are logged out !', 'alert-class' => 'alert-warning']);
    	}
        
    }


    /**
	 * Generate a unique slug.
	 * If it already exists, a number suffix will be appended.
	 *
	 * @link webcomindia.biz
	 *
	 * @param Illuminate\Database\Eloquent\Model $model
	 * @param string $value
	 * @return string
	 */
	public static function getUniqueSlug(\Illuminate\Database\Eloquent\Model $model, $value)
	{
	    $slug = \Illuminate\Support\Str::slug($value);
	    $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

	    return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
	}


	public static function projectSlugGhost($slug = null) {
		$c = DB::table('projects')->where('slug', trim($slug))->count();
		if($c) {
			return DB::table('projects')
					->join('categories', 'categories.id', '=', 'projects.category_id')
					->select('projects.id', 'projects.name', 'projects.description', 'projects.budget', 'projects.contact_number', 'projects.status', 'projects.created_at', 'projects.updated_at', 'categories.name as category', 'categories.id as category_id')
					->first();
		}
		return false;
	}

	public static function getAllCategories($list = false) {
		if($list) return DB::table('categories')->orderBy('name','asc')->where('status',1)->pluck('name','id');
			return DB::table('categories')->orderBy('name','asc')->where('status',1)->get();
	}

	public static function getAllSubCategories($list = false) {
		if($list) return DB::table('sub_categories')->orderBy('name','asc')->where('status',1)->pluck('name','id');
			return DB::table('sub_categories')
					->join('categories', 'categories.id', '=', 'sub_categories.category_id')
					->orderBy('sub_categories.name','asc')
					->where('sub_categories.status',1)
					->select('categories.name as categoryName', 'categories.id as categoryId', 'sub_categories.name as subCategoryName', 'sub_categories.id as subCategoryId')
					->get();
	}

	public static function saveProfileData($data) {
		
	}
}