<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class ProjectLocation extends Model
{
    protected $fillable = array('project_id', 'latitude', 'longitude', 'name');
	   protected $table    = 'project_locations';
     protected $guarded  = ['_token'];

    public static $rules = [
    	'project_id' 	=> 'required|exists:projects,id',
    	'latitude' 		=> 'required',
		'longitude' 	=> 'required',
		'name'			=> 'required',
    ];
}
