<?php

namespace App\Http\Controllers\Admin\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;
use DB, Validator, Redirect, Auth, Crypt;
use App\Models\Master\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Helper::getAllCategories($list = false);
        return view('admin.master.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.master.categories.create');
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
        $slug = Helper::getUniqueSlug(new Category(), $request->name);
        $data['slug'] = $slug;
        
        $validator = Validator::make($data, Category::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        if ($request->hasFile('icon')) {

            if ($request->file('icon')->isValid()){
                $file           = $request->file('icon');

                $filename       = strtolower(uniqid()).'_'.$slug.'.'.$file->getClientOriginalExtension();

                $destinationPath = 'icons/categories';
                $file->move($destinationPath,$filename);

                $data['icon_path']           = $destinationPath.'/'.$filename;
            }
        }else{
            $message .= 'Image is empty !';
            $class .= 'alert-danger';
            return Redirect::back()->with(['message' => $message, 'alert-class' => $class]);
        }

        
        if(Category::create($data)) {
            $class .= 'alert-success';
            $message .= 'Category added successfully !';
        }else{
            $class .= 'alert-danger';
            $message .= 'Unable store Category !';
        }

        return Redirect::route('admin.category.index')->with('message', $message);
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
        $category = Category::find($id);
        return view('admin.master.categories.edit', compact('category'));
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
        $data = $request->except('_token', 'icon');
        $slug = Helper::getUniqueSlug(new Category(), $request->name);
        $data['slug'] = $slug;


        $rules = [
            'name'      =>  'required|max:255|unique:categories,name,'.$id,
            'slug'      =>  'required|max:127|unique:categories,slug,'.$id,
            'icon'      =>  'max:255|mimes:jpeg,bmp,png,svg',
        ];

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $category = Category::find($id);

        if ($request->hasFile('icon')) {

            if ($request->file('icon')->isValid()){
                $file           = $request->file('icon');

                $filename       = strtolower(uniqid()).'_'.$slug.'.'.$file->getClientOriginalExtension();

                $destinationPath = 'icons/categories';
                $file->move($destinationPath,$filename);

                $data['icon_path']           = $destinationPath.'/'.$filename;
            }
        }

        $category->fill($data);
        $message = $class = '';

        if($category->save()) {
            $class .= 'alert-success';
            $message .= 'Category updated successfully !';
        }else{
            $class .= 'alert-danger';
            $message .= 'Unable update Category !';
        }
        return Redirect::route('admin.category.index')->with(['message' => $message, 'alert-class' => $class]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function disable($id)
    {
        $category = Category::find($id);
        $category->status = 0;

        $message = $class = '';
        
        if($category->save()) {
            $class .= 'alert-success';
            $message .= 'Category removed successfully !';
        }else{
            $class .= 'alert-danger';
            $message .= 'Unable remove Category !';
        }
        return Redirect::route('admin.category.index')->with(['message' => $message, 'alert-class' => $class]);
    }
}
