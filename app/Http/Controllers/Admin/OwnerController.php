<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Owner;

class OwnerController extends Controller
{
    public function view()
    {
        return view('pages.admin.owner.data', [
            'owner' => Owner::class,
        ]);
    }
}