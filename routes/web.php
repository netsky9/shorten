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

//Route::get('/admin', [App\Http\Controllers\Admin\MainController::class, 'index'])
//    ->name('admin.index')
//    ->middleware(['role:super-admin|admin|manager|company|writer']);

Route::middleware(['role:super-admin|admin|manager|company|writer'])
    ->prefix('admin')->group(function () {

    Route::get('/control-panel', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('admin.index');

    /**
     * Categories routes
     */
    Route::resource('products/categories', \App\Http\Controllers\Admin\Products\ProductCategoryController::class, [
        'names'=>'admin.products.categories'
    ]);

    Route::resource('companies', \App\Http\Controllers\Admin\CompanyController::class, [
        'names'=>'admin.companies'
    ]);

});



Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');

Route::post('/link/create', [App\Http\Controllers\LinkController::class, 'create'])->name('link.create');

Route::get('/{link_alias}', [App\Http\Controllers\LinkController::class, 'redirect'])->where('link_alias', '[A-Za-z0-9]{6}');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
