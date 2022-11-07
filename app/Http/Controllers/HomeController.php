<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function expired()
    {
        return view('expired');
    }

    public function notActive()
    {
        return view('not-active');
    }
}