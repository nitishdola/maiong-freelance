<?php

namespace App\Http\Controllers\User\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    public function compose(Request $request) {
    	return view('user.messages.compose');
    }
}
