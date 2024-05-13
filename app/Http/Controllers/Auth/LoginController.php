<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function authenticate(Request $request){
        dd($request->all());
        $field = $request->input('login_field');
        $password = $request->input('password');

        //check if the login field is an email or a phone number
    $credentials = [
        'password' => $password,
        filter_var($field, FILTER_VALIDATE_EMAIL)?
            'parent_email':(is_numeric($field)? 'father_phone' : 'mother_phone') =>$field,
    ];
        if (Auth::attempt($credentials)) {
            // Authentication passed
            return redirect()->intended(route('home'));
        } else {
            // Authentication failed
            return back()->withErrors(['login_field' => 'Invalid credentials']);
        }
    }



    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
