<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::group(["middleware" => ['auth:sanctum', 'verified']], function () {

    Route::group(["prefix" => "admin", "middleware" => 'checkrole:1'], function () {
        Route::view('/', "dashboard")->name('admin.dashboard');
        Route::get('/user', [UserController::class, "view"])->name('admin.user-list');
        Route::view('/user/new', "pages.user.user-new")->name('admin.user-new');
        Route::view('/user/edit/{userId}', "pages.user.user-edit")->name('admin.user-edit');
    });

    Route::group(["prefix" => "owner", "middleware" => 'checkrole:2'], function () {
        Route::view('/owner', "dashboard")->name('owner');
    });
});