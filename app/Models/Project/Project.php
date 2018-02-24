<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = array('user_id', 'name', 'slug', 'description', 'category_id', 'budget', 'contact_number', 'locality', 'longitude', 'latitude');
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
    	'150000 - 250000' => 'Large project (₹150000 - 250000 INR)',
    ];



    public static function apiBudgets() {
      $project_budgets1 = [
        'val' 		=>  '600-1500',
        'name'  	=>  'Micro Project (₹600 - 1500 INR)',
      ];
      $project_budgets2 = [
        'val' 		=>  '1500-12500',
        'name'  	=>  'Simple project (₹1500 - 12500 INR)',
      ];
      $project_budgets3 = [
        'val' 		=>  '12500-37500',
        'name'  	=>  'Very small project (₹12500 - 37500 INR)',
      ];
      $project_budgets4 = [
        'val' 		=>  '37500-75000',
        'name'  	=>  'Small project (₹37500 - 75000 INR)',
      ];
      $project_budgets5 = [
        'val' 		=>  '75000-150000',
        'name'  	=>  'Medium project (₹75000 - 150000 INR)',
      ];
      $project_budgets6 = [
        'val' 		=>  '150000 - 250000',
        'name'  	=>  'Large project (₹150000 - 250000 INR)',
      ];
      $project_budgets[0]= $project_budgets1 ;
      $project_budgets[1]= $project_budgets2 ;
      $project_budgets[2]= $project_budgets3 ;
      $project_budgets[3]= $project_budgets4 ;
      $project_budgets[4]= $project_budgets5 ;
      $project_budgets[5]= $project_budgets6 ;

      return json_encode($project_budgets);
    }
}
