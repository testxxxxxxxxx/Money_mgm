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

Route::get('/',[App\Http\Controllers\ApplicationController::class,'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/ShowResults',[App\Http\Controllers\ApplicationController::class,'ShowResults'])->middleware('auth')->name('ShowResults');
Route::get('/home/AddReceiptForms',[App\Http\Controllers\ApplicationController::class,'AddReceiptForms'])->middleware('auth')->name('AddReceiptForms');
Route::get('/home/getReceiptForm',[App\Http\Controllers\ApplicationController::class,'getReceiptForm'])->middleware('auth')->name('getReceiptForm');
Route::get('/home/AddReceipt',[App\Http\Controllers\ApplicationController::class,'AddReceipt'])->middleware('auth')->name('AddReceipt');
Route::get('/home/showReceipt',[App\Http\Controllers\ApplicationController::class,'showReceipt'])->middleware('auth')->name('showReceipt');
Route::get('/home/getUpdateReceiptForm',[App\Http\Controllers\ApplicationController::class,'getUpdateReceiptForm'])->middleware('auth')->name('getUpdateReceiptForm');
Route::get('/home/UpdateReceipt',[App\Http\Controllers\ApplicationController::class,'UpdateReceipt'])->middleware('auth')->name('UpdateReceipt');
Route::get('/home/DeleteReceipt',[App\Http\Controllers\ApplicationController::class,'DeleteReceipt'])->middleware('auth')->name('DeleteReceipt');

