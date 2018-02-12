<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Helper;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Master\SubCategory;

class SubCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = Helper::getAllSubCategories($list = false, $category_id = false);
        return view('admin.master.sub_categories.index', compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Helper::getAllCategories($list = true);
        return view('admin.master.sub_categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = $class = '';
        $data = $request->all();
        
        $validator = Validator::make($data, SubCategory::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        
        if(SubCategory::create($data)) {
            $class .= 'alert-success';
            $message .= 'Sub-Category added successfully !';
        }else{
            $class .= 'alert-danger';
            $message .= 'Unable store Sub-Category !';
        }

        return Redirect::route('admin.sub_category.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sub_category = SubCategory::find($id);
        $categories = Helper::getAllCategories($list = true);
        return view('admin.master.sub_categories.edit', compact('sub_category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [];
        $data = $request->except('_token');

        $rules = SubCategory::$rules;

        $rules = [
            'name'      =>  'required|max:255|unique:sub_categories,name,'.$id,
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $sub_category = SubCategory::find($id);

        

        $sub_category->fill($data);
        $message = $class = '';

        if($sub_category->save()) {
            $class .= 'alert-success';
            $message .= 'Sub Category updated successfully !';
        }else{
            $class .= 'alert-danger';
            $message .= 'Unable update Sub Category !';
        }
        return Redirect::route('admin.sub_category.index')->with(['message' => $message, 'alert-class' => $class]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $sub_category = SubCategory::find($id);
        $sub_category->status = 0;

        $message = $class = '';
        
        if($sub_category->save()) {
            $class .= 'alert-success';
            $message .= 'Sub Category removed successfully !';
        }else{
            $class .= 'alert-danger';
            $message .= 'Unable remove CSub category !';
        }
        return Redirect::route('admin.sub_category.index')->with(['message' => $message, 'alert-class' => $class]);
    }
}
