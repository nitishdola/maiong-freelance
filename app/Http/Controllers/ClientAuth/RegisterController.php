<?php

namespace App\Http\Controllers\ClientAuth;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Helper;
use DB, Validator, Redirect, Crypt,Mail;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/client/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('client.guest');
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:clients',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Client
     */
    protected function create(array $data)
    {
        return Client::create([
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
        return view('client.auth.register');
    }

    public function register(Request $request) {
        $data = $request->except('_token');

        $validator = Validator::make($data, Client::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $data['password'] = bcrypt($request->password);
        $data['email_confirmation_code'] = Helper::generateRandomString(10);

        
        if(Client::create($data)) {
            //SEND MAIL
            Mail::send('mails.confirmation', $data, function($message) use($data) {
                $message->to($data['email']);
                $message->subject('Maiong Registraion Email Confirmation');
            });    

            return redirect(route('client.login'))->with(['message' => 'Confirmation email has been send to registered email', 'alert-class' => 'alert-success']);
        }

    }

    public function confirmEmail(Request $request, $token){
        $confirm =Client::where('email_confirmation_code', $token)->first();
        if($confirm) {
            $confirm->email_confirmation_code = '';
            $confirm->is_email_confirmed = 1;
            $confirm->save();

            Auth::guard('client')->login($confirm);
            return redirect(route('home'));
        }
        return redirect(route('client.login'))->with(['message' => 'Invalid Code. Email not confirmed', 'alert-class' => 'alert-danger']);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('client');
    }
}
