<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\staffAdministrasiController;
use App\Http\Controllers\dataPMKSController;
use App\Http\Controllers\serviceKejiwaanController;
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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::POST('/', [LoginController::class, 'authenticate'])->name('login.authenticate');

Route::get('/dashboard', function(){
    Return view('pages.dashboard.customer');});

Route::resource('/dashboard/staffadmin', staffAdministrasiController::class);
Route::get('/download/staffadmin', [staffAdministrasiController::class, 'cetak_pdf']);

Route::resource('/dashboard/customer', CustomerController::class);
Route::get('/download/customer', [CustomerController::class, 'cetak_pdf']);

Route::resource('/dashboard/dataPMKS', dataPMKSController::class);
Route::get('/download/dataPMKS', [dataPMKSController::class, 'cetak_pdf']);

Route::resource('/dashboard/jiwa', serviceKejiwaanController::class);
Route::get('/download/jiwa', [serviceKejiwaanController::class, 'cetak_pdf']);

Route::resource('/dashboard/sosial', serviceSosialController::class);
Route::get('/download/sosial', [serviceSosialController::class, 'cetak_pdf']);