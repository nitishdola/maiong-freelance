<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class ProfileImage extends Model
{
    protected $fillable = array('user_profile_id', 'image_path');
	protected $table    = 'profile_images';
    protected $guarded  = ['_token'];

    public function rules()
    {
        
        $photos = count($this->input('photos'));
        foreach(range(0, $photos) as $index) {
            $rules['photos.' . $index] = 'image|mimes:jpeg,bmp,png|max:2000';
        }
 
        return $rules;
    }
}
