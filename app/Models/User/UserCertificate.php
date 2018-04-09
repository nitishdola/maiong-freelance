<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class UserCertificate extends Model
{
    protected $fillable = [
        'user_id', 'certificate_name',
    ];

    public static $rules = [
        'user_id'      		=> 'required|exists:users,id',
        'certificate_name'  => 'required',
    ];
}
