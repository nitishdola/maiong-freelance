<?php

namespace App\Http\Controllers\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;
use DB, Validator, Redirect, Auth, Crypt, Response;

use App\Models\Master\Category;
use App\Models\Profile\UserProfile;

class ApiController extends Controller
{
    public function categoryIndex(Request $request) {
        if($request->dump == 'yes') {
            return Response::json(DB::table('categories')->where('status',1)->get(), $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
        }else{
            return DB::table('categories')->where('status',1)->get();
        }

    }

    public function mailApiUsers(Request $request) {
        $id = $request->id;
        if($request->dump == 'yes') {
            return Response::json(DB::table('users')->where('status',1)->get(), $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
        }else{
            return DB::table('users')->select('id', 'name', 'email')->where('id', '!=', $id)->where('is_email_confirmed',1)->get();
        }

    }

    public function mailApiUsersByName(Request $request) {
        $name = $request->search_text;
        $id = $request->id;

        return DB::table('users')
                    ->select('id', 'name', 'email')
                    ->where('name', 'like', '%' . $name . '%')
                    ->where('id', '!=', $id)
                    ->where('is_email_confirmed',1)->get();

    }

    public function subCategoryIndex(Request $request) {
    	$where = [];
    	if($request->category_id) {
    		$where['category_id'] = $request->category_id;
    	}
        if($request->dump == 'yes') {
            return Response::json(DB::table('sub_categories')->where($where)->where('status',1)->get(), $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
        }else{
            return DB::table('sub_categories')->where($where)->where('status',1)->get();
        }

    }

    public function topCategories(Request $request) {
      $limit = 4;
      if($request->limit) {
        $limit = $request->limit;
      }
      return $categories = Category::inRandomOrder()->withCount('profiles')->limit($limit)->get();
    }

    public function getProfiles(Request $request) {
      $limit = 10;
      $where = [];
      if($request->limit) {
        $limit = $request->limit;
      }

      if($request->category_id) {
        $category_id = $request->category_id;
        $where['category_id'] = $category_id;
      }

      return UserProfile::where($where)->whereStatus(1)->with('user', 'category', 'profile_images', 'profile_locations')->inRandomOrder()->limit($limit)->get();
    }


}
