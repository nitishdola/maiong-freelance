<?php

namespace App\Http\Controllers\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;
use DB, Validator, Redirect, Auth, Crypt, Response;

class ApiController extends Controller
{
    public function categoryIndex(Request $request) {
        if($request->dump == 'yes') {
            return Response::json(DB::table('categories')->where('status',1)->get(), $status=200, $headers=[], $options=JSON_PRETTY_PRINT);   
        }else{
            return DB::table('categories')->where('status',1)->get();    
        }
    	
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

    
}
