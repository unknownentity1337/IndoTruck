<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use DateTime;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $owner = Owner::where('user_id', auth()->user()->id)->first();
        if ($owner) {
            $expired = new DateTime($owner->expired_at);
            $start = new DateTime($owner->updated_at);
            $diff = strtotime($owner->expired_at) - strtotime($owner->updated_at);
        } else {
            $expired = null;
            $start = null;
            $diff = null;
        }
        return view('dashboard', compact('owner', 'diff'));
    }
}