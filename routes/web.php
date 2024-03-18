<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;


Route::get('/', [MainController::class, 'group'])->name('group');
Route::post('/post-form', [MainController::class, 'save_group']);
