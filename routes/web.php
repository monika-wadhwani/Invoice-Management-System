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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/invoices', [App\Http\Controllers\HomeController::class, 'invoices'])->name('invoices');
Route::get('/manage_invoices', [App\Http\Controllers\HomeController::class, 'manage_invoices'])->name('manage_invoices');
Route::post('/get_invoice_data', [App\Http\Controllers\HomeController::class, 'get_invoice_data'])->name('get_invoice_data');
Route::post('/invoice_data', [App\Http\Controllers\HomeController::class, 'invoice_data'])->name('invoice_data');
Route::get('/google_api', [App\Http\Controllers\HomeController::class, 'google_api'])->name('google_api');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::get('/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('delete');
Route::patch('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
