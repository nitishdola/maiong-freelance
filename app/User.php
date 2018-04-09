<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'email_confirmation_code', 'api_key', 'password',
    ];

    public static $rules = [
        'name'      => 'required|min:3',
        'email'     => 'required|unique:clients|email',
        'password'  => 'required|min:6|required',
        'password_confirmation' => 'required|min:6|same:password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills()
    {
        return $this->hasMany('App\Models\User\UserSkill');
    }

    public function certificates()
    {
        return $this->hasMany('App\Models\User\UserCertificate');
    }
}
