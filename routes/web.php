<?php

use Illuminate\Support\Facades\Route;
use Modules\Property\app\Http\Controllers\Admin\PropertyController as AdminPropertyController;
use Modules\Property\app\Http\Controllers\PropertyController;

// use Modules\Property\Http\Controllers\Admin\PropertyController;

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

// Guest
Route::get('properties', [PropertyController::class, 'index'])->name('property.index');
Route::get('property', fn () => redirect(route('property.index')));
Route::get('property/{property}', [PropertyController::class, 'show'])->name('property.show');

// Admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', AdminPropertyController::class)->except(['index'])->names('property');
    Route::get('properties', [AdminPropertyController::class, 'index'])->name('property.index');
    Route::get('property', fn () => redirect(route('admin.property.index')));
});
