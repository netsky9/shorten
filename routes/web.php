<?php

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

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');

Route::post('/link/create', [App\Http\Controllers\LinkController::class, 'create'])->name('link.create');

Route::get('/{link_alias}', [App\Http\Controllers\LinkController::class, 'redirect'])->where('link_alias', '[A-Za-z0-9]{6}');