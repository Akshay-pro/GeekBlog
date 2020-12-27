<?php

use App\Http\Controllers\User\RoleController;

use App\Http\Controllers\User\CategoryController;
// Admin Panel


use Illuminate\Support\Facades\Route;

// Route Dashboard
Route::view('/adminpanel','adminpanel.dashboard.index')->name('admin.dashboard');

//User route 
Route::resource('/adminpanel/user',User\UserController::class);

//Role Route 

Route::get('/adminpanel/role/{role}/assign-permission',[RoleController::class,'assignPermissionView'])->name('role.assign.permission');
Route::post('/adminpanel/role/{role}/assign-permission',[RoleController::class,'assignPermission'])->name('role.store.permission');

Route::resource('/adminpanel/role',User\RoleController::class);


//Permission Route
Route::resource('/adminpanel/permission',User\PermissionController::class);

//Category Route
Route::get('/adminpanel/category/trashed',[CategoryController::class,'trashCategory'])->name('category.trashed');
Route::post('/adminpanel/category/{category}/restore',[CategoryController::class,'restoreCategory'])->name('category.restore');
Route::delete('/adminpanel/category/{category}/delete',[CategoryController::class,'permaDeleteCategory'])->name('category.perma.delete');   

Route::resource('/adminpanel/category',User\CategoryController::class);

