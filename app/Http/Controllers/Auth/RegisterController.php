<?php

namespace App\Http\Controllers\Auth;

use Newsletter;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/community';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
        // Page data
        $page_header = "Register";

        return view('auth.register')->with('page_header', $page_header);
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'string|max:255',
            'username' => 'required|string|max:128|unique:users',
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
        // Register user in MailChimp
        Newsletter::subscribeOrUpdate($data['email'], ['FNAME'=>$data["first_name"], 'LNAME'=>$data["last_name"]]);

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => strtolower($data['username']),
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}
