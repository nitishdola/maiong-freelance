<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

class InquiryAttachement extends Model
{
  protected $fillable = array('inquiry_id', 'file_path');
  protected $table    = 'inquiry_attachements';
  protected $guarded  = ['_token'];

  public static $rules = [
      'inquiry_id'   			 =>  'required|exists:inquiries,id',
      'file_path' 		     =>  'required',
  ];

  public function inquiry()
  {
      return $this->belongsTo('App\Models\Profile\Inquiry', 'inquiry_id');
  }
}
