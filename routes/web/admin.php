<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('admin.index');
});

Route::resource('users', \App\Http\Controllers\Admin\Usercontroller::class);
