<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class,'index'])->name('post');

Route::resource('/admin',AdminController::class);

Route::get('/delete/{id}',[AdminController::class,'destroy'])->name('delete');

Route::get('/post/{slug}',[PostController::class,'show'])->name('post.show');