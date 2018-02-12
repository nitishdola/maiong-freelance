<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Helper;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Master\Category;
use App\Models\Project\Project;
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
    			$projects = Project::where('category_id')->where('status',1)->get();
    			return view('public.view_jobs_by_category', compact('jobs'));
    		}
    	}
    	return Redirect::route('public.view_categories');
    }
}
