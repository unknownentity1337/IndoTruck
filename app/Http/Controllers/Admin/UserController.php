<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Owner;

class UserController extends Controller
{
    public function view()
    {
        return view('pages.admin.user.data', [
            'user' => User::class
        ]);
    }

    public function test()
    {
        $owner = Owner::find(1);
        $user = $owner->user;
        return $user;
    }
}