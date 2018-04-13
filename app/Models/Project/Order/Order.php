<?php

namespace App\Models\Project\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'buyer_id', 'seller_id','user_profile_id','project_cost','order_date',
    ];

    public static $rules = [
        'buyer_id'   		=> 'required|exists:users,id',
        'seller_id'  		=> 'required|exists:users,id',
        'user_profile_id'  	=> 'required|exists:user_profiles,id',
        'project_cost'  	=> 'required',
        'order_date' 	 	=> 'required|date_format:Y-m-d',

    ];

    public function buyer()
	{
	  return $this->belongsTo('App\User', 'buyer_id');
	}

	public function seller()
	{
	  return $this->belongsTo('App\User', 'seller_id');
	}

	public function userProfile()
	{
	  return $this->belongsTo('App\Models\Profile\UserProfile', 'user_profile_id');
	}
}
