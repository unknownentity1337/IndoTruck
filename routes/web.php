<?php

use App\Http\Controllers\Admin\OwnerController;
use App\Http\Controllers\Admin\UserController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Redirects;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
/-------------------------------------------------------
/ Role
/-------------------------------------------------------
/ 0 = User
/ 1 = Admin
/ 2 = Owner
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirects', [Redirects::class, 'dashboard'])->name('redirects');

Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {

    Route::group(["prefix" => "admin", "middleware" => 'checkrole:1'], function () {
        Route::view('/', "dashboard")->name('admin.dashboard');

        // User
        Route::get('/user', [UserController::class, "view"])->name('admin.user-list');
        Route::view('/user/new', "pages.admin.user.new")->name('admin.user-new');
        Route::view('/user/edit/{userId}', "pages.admin.user.edit")->name('admin.user-edit');

        // Owner Expirate Date & Total Apps Can Create
        Route::get('/owner', [OwnerController::class, "view"])->name('admin.owner-list');
        Route::view('/owner/new', "pages.admin.owner.new")->name('admin.owner-new');
        Route::view('/owner/edit/{ownerId}', "pages.admin.owner.edit")->name('admin.owner-edit');
    });

    Route::group(["prefix" => "owner", "middleware" => 'checkrole:2'], function () {
        Route::view('/', "dashboard")->name('owner.dashboard');
    });

    Route::group(["prefix" => "user", "middleware" => 'checkrole:2'], function () {
        Route::view('/', "dashboard")->name('user.dashboard');
    });
});