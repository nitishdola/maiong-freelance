<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Model;

class MessageAttachement extends Model
{
  protected $fillable = array('message_id', 'file_path' );
  protected $table    = 'message_attachements';
  protected $guarded  = ['_token'];

  public static $rules = [
    'message_id'   	=>  'required|exists:messages,id',
    'file_path' 	 =>  'required',
  ];

  public function message()
  {
      return $this->belongsTo('App\Models\Message', 'message_id');
  }
}
