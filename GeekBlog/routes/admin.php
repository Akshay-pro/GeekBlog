<?php


// Admin Panel


use Illuminate\Support\Facades\Route;


Route::view('/adminpanel','adminpanel.dashboard.index')->name('admin.dashboard');

//user route resource
Route::resource('/adminpanel/user',User\UserController::class);

//Role Route resource
Route::resource('/adminpanel/role',User\RoleController::class);

//Permission Route resource
Route::resource('/adminpanel/permission',User\PermissionController::class);