<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Helper;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Master\Category;
use App\Models\Profile\UserProfile;
class PublicController extends Controller
{
    public function viewHome() {
    	$categories = Helper::getAllCategories($list = false);
    	return view('public.home', compact('categories'));
    }

    public function viewAllCategories() {
    	$categories = Helper::getAllCategories($list = false);
    	return view('public.view_categories', compact('categories'));
    }

    public function viewJobsByCategory($category_slug = null) {
    	if($category_slug != null) {
    		$category = Category::where('slug', $category_slug)->first();
    		if($category) {
    			$user_profiles = UserProfile::where('category_id',$category->id)->with('profile_locations', 'profile_images')->where('status',1)->get();
    			return view('public.view_jobs_by_category', compact('user_profiles', 'category'));
    		}
    	}
    	return Redirect::route('public.view_categories');
    }
}
