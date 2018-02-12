<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Helper;
use DB, Validator, Redirect, Crypt;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('ui.maiong_ui.auth.login');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'email'         => 'email|required',
            'password'      => 'required',
        ]);
        if (auth()->attempt($request->except('_token')))
        {
            return redirect(route('home'));
        }else{
            return redirect(route('user.login'))->with(['message' => 'Invalid Credintials', 'alert-class' => 'alert-danger']);
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
