<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

use Helper;
use DB, Redirect, Crypt,Mail, Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('ui.maiong_ui.auth.register');
    }

    public function register(Request $request) {
        $data = $request->except('_token');

        $validator = Validator::make($data, User::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['password'] = bcrypt($request->password);
        $data['email_confirmation_code'] = Helper::generateRandomString(10);

        
        if(User::create($data)) {
            //SEND MAIL
            Mail::send('mails.confirmation', $data, function($message) use($data) {
                $message->to($data['email']);
                $message->subject('Maiong Registraion Email Confirmation');
            });    

            return redirect(route('user.login'))->with(['message' => 'Confirmation email has been send to registered email', 'alert-class' => 'alert-success']);
        }

    }

    public function confirmEmail(Request $request, $token){
        $confirm =User::where('email_confirmation_code', $token)->first();
        if($confirm) {
            $confirm->email_confirmation_code = '';
            $confirm->is_email_confirmed = 1;

            $confirm->member_since = date('Y-m-d');
            $confirm->save();

            Auth::login($confirm);
            return redirect(route('home'));
        }
        return redirect(route('user.login'))->with(['message' => 'Invalid Code. Email not confirmed', 'alert-class' => 'alert-danger']);
    }
}
