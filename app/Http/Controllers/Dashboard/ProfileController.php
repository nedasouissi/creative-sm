<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }
}
