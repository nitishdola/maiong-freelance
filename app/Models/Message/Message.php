<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = array('sender_id', 'receiver_id','profile_id', 'subject','message', 'message_date','reply_to' );
	protected $table    = 'messages';
    protected $guarded  = ['_token'];

    public static $rules = [
        'sender_id'   	=>  'required|exists:users,id',
    	'receiver_id' 	=>  'required|exists:users,id', 
    	'subject' 		=>  'required|min:4',
    	'message' 		=>  'required|min:4',
    	'message_date' 	=>  'required|date_format:Y-m-d H:i:s'
    ];

    public function sender() 
    {
        return $this->belongsTo('App\User', 'sender_id');
    }

    public function receiver() 
    {
        return $this->belongsTo('App\User', 'receiver_id');
    }

    public function profile() 
    {
        return $this->belongsTo('App\Models\Profile\UserProfile', 'profile_id');
    }

    public function reply() 
    {
        return $this->belongsTo('App\Models\Message\Message', 'reply_to');
    }
}
