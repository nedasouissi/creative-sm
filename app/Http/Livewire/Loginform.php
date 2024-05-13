<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Loginform extends Component
{
    public $email , $password;

    public function login()
    {
        $credentials = [
            filter_var($this->email, FILTER_VALIDATE_EMAIL) ?
                'parent_email' : (is_numeric($this->email) ? 'father_phone' : 'mother_phone') => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('home'));
        } else {
            $this->addError('email', 'Invalid credentials');
        }
    }
    public function render()
    {
        return view('livewire.loginform');
    }
}
