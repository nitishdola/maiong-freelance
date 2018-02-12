<?php

namespace App\Models\User\Profiles;

use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
