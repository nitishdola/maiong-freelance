<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
     protected $fillable = array('project_id', 'image_path');
	   protected $table    = 'project_images';
     protected $guarded  = ['_token'];

    /*public static $rules = [
    	'project_id' 	=> 'required|exists:projects,id',
    	'image' 		=> 'required|image|max:10000',
    ];*/

    public function rules()
    {
        $rules = [
            'name' => 'required'
        ];
        $photos = count($this->input('photos'));
        foreach(range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }

        return $rules;
    }
}
