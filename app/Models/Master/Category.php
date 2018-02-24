<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = array('name', 'slug', 'icon_path');
	protected $table    = 'categories';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'name' 		=>  'required|max:255|unique:categories',
    	'slug'  	=>  'required|max:127|unique:categories',
    	'icon' 		=>  'required|max:255|mimes:jpeg,bmp,png,svg',
    ];


    public function profiles()
    {
        return $this->hasMany('App\Models\Profile\UserProfile');
    }
}
