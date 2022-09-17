<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Redirects extends Controller
{

    public function dashboard()
    {
        if (auth()->user()->role == 1) {
            return redirect()->route('admin');
        } else if (auth()->user()->role == 2) {
            return redirect()->route('owner');
        } else {
            return redirect()->route('dashboard');
        }
    }
}