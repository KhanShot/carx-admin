<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route("login");
});

Auth::routes([]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('roles:admin')->name('admin.')->group(function (){
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('campaign', \App\Http\Controllers\Admin\CampaignController::class);
    Route::post('store', [\App\Http\Controllers\TransactionController::class, 'store'])->name('transaction.store');

    Route::get('forms', [\App\Http\Controllers\Admin\FormController::class, 'index'])->name('form.index');
    Route::get('transaction', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transaction.index');


});

Route::prefix('partner')->middleware(['roles:partner'])->name('partner.')->group(function (){
    Route::get('dashboard', [\App\Http\Controllers\Partner\DashboardController::class, 'index'])->name('dashboard');
    Route::get('forms', [\App\Http\Controllers\Partner\FormController::class, 'index'])->name('form.index');
});

Route::post('forms', [\App\Http\Controllers\Partner\FormController::class, 'store'])->name('form.store');
Route::get('forms/get', [\App\Http\Controllers\Admin\FormController::class, 'getForms']);


