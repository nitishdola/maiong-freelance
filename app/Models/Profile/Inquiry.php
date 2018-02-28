<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
  protected $fillable = array('profile_id', 'sender_user_id', 'message');
  protected $table    = 'inquiries';
  protected $guarded  = ['_token'];

  public static $rules = [
      'profile_id'   			 =>  'required|exists:user_profiles,id',
      'sender_user_id' 		 =>  'required|exists:users,id',
      'message'  				   =>  'required|min:10',
  ];

  public function profile()
  {
      return $this->belongsTo('App\Models\Profile\UserProfile', 'profile_id');
  }

  public function sender()
  {
      return $this->belongsTo('App\User', 'sender_user_id');
  }

  public function attached_files()
  {
      return $this->hasMany('App\Models\Profile\InquiryAttachement');
  }
}
