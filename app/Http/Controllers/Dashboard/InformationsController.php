<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformationsController extends Controller
{
    public function index()
    {
        return view('espace_intranet.informations');
    }
}
