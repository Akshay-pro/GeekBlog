<?php


// Admin Panel

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::view('/adminpanel','adminpanel.dashboard.index')->name('admin.dashboard');

Route::get('/adminpanel/users',[UserController::class,'index'])->name('user.index');

Route::get('/adminpanel/users/create',[UserController::class,'create'])->name('user.create');

Route::post('/adminpanel/users',[UserController::class,'store'])->name('user.store');

Route::get('/adminpanel/users/{user}/edit',[UserController::class,'edit'])->name('user.edit');

Route::put('/adminpanel/users{user}/update',[UserController::class,'update'])->name('user.update');

Route::delete('/adminpanel/users{user}/delete',[UserController::class,'destroy'])->name('user.destroy');

// End Admin panel Route