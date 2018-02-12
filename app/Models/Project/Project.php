<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = array('user_id', 'name', 'slug', 'description', 'category_id', 'budget', 'contact_number');
	protected $table    = 'projects';
    protected $guarded  = ['_token'];

    public static $rules = [
        'user_id'   =>  'required|exists:categories,id',
    	'name' 		=>  'required|max:255|unique:projects', 
    	'slug'  	=>  'required|max:255|unique:projects',
    	'description' 		=>  'required|min:30',
    	'category_id' => 'required|exists:categories,id',
    	'budget' 	=> 'required',
    	'contact_number' => 'required',
    ];

    public static $project_budgets = [
    	'600-1500' 		=>  'Micro Project (₹600 - 1500 INR)', 
    	'1500-12500'  	=>  'Simple project (₹1500 - 12500 INR)',
    	'12500-37500' 	=>  'Very small project (₹12500 - 37500 INR)',
    	'37500-75000' 	=> 'Small project (₹37500 - 75000 INR)',
    	'75000-150000' 	=> 'Medium project (₹75000 - 150000 INR)',
    	'contact_number' => 'Large project (₹150000 - 250000 INR)',
    ];
}
