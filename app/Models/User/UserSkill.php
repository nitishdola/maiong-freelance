<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    protected $fillable = [
        'user_id', 'skill_id',
    ];

    public static $rules = [
        'user_id'      		=> 'required|exists:users,id',
        'skill_id'      	=> 'required|exists:skills,id',
    ];
}
