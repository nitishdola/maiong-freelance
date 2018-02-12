<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = array('name', 'category_id');
	protected $table    = 'sub_categories';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 			=>  'required|max:255|unique:sub_categories', 
    	'category_id' 	=>  'required|exists:categories,id',
    ];
}
