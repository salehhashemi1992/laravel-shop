<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.index');
});

Route::resource('users', \App\Http\Controllers\Admin\User\UserController::class)->except('show');
Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class)->except('show');
Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class)->except('show');
Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except('show');

Route::get('/users/{user}/permissions', [\App\Http\Controllers\Admin\User\PermissionController::class, 'create'])->name('users.permissions');
Route::post('/users/{user}/permissions', [\App\Http\Controllers\Admin\User\PermissionController::class, 'manage'])->name('users.permissions.manage');

Route::get('/comments/unapproved', [\App\Http\Controllers\Admin\CommentController::class, 'unapproved'])->name('comments.unapproved');
Route::resource('comments', \App\Http\Controllers\Admin\CommentController::class)->only(['index', 'update', 'destroy']);
Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
