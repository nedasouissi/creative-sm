<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\StudentParent;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'father_name' => ['required', 'string', 'max:255'],
            'father_last_name' => ['required', 'string', 'max:255'],
            'father_job' => ['required', 'string', 'max:255'],
            'father_phone' => ['nullable', 'numeric'],
            'mother_name' => ['required', 'string', 'max:255'],
            'mother_last_name' => ['required', 'string', 'max:255'],
            'mother_job' => ['required', 'string', 'max:255'],
            'mother_phone' => ['nullable', 'numeric'],
            'status' => ['nullable', 'boolean'],
            'parent_email' => ['nullable', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return StudentParent::create([
            'father_name' => $data['father_name'],
            'father_last_name' => $data['father_last_name'],
            'father_phone' => $data['father_phone'],
            'parent_email' => $data['parent_email'],
            'father_job' => $data['father_job'],
            'mother_name' => $data['mother_name'],
            'mother_last_name' => $data['mother_last_name'],
            'mother_phone' => $data['mother_phone'],
            'mother_job' => $data['mother_job'],
            'status' => $data['status'] ?? false,
            'password' => Hash::make($data['password']),
        ]);
    }

}
