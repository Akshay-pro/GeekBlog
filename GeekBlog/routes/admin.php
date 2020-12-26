<?php


// Admin Panel


use Illuminate\Support\Facades\Route;


Route::view('/adminpanel','adminpanel.dashboard.index')->name('admin.dashboard');

//user route resource
Route::resource('/adminpanel/user',User\UserController::class);

Route::resource('/adminpanel/role',User\RoleController::class);