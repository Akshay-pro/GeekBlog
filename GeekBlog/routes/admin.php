<?php


// Admin Panel

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::view('/adminpanel','adminpanel.dashboard.index')->name('admin.dashboard');

Route::get('/adminpanel/user',[UserController::class,'index'])->name('user.index');

Route::get('/adminpanel/user/create',[UserController::class,'create'])->name('user.create');

// End Admin panel Route