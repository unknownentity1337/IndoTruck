<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Redirects extends Controller
{

    public function dashboard()
    {
        if (auth()->user()->role == 1) {
            return redirect()->route('admin.dashboard');
        } else if (auth()->user()->role == 2) {
            return redirect()->route('owner.dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    }
}