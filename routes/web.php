<?php

use App\Http\Controllers\ApprovePermitController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermitController;
use App\Http\Controllers\PermitHistoryController;
use App\Http\Controllers\PermitRequestController;
use App\Http\Controllers\RejectPermitController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', DashboardController::class)->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
  Route::resource('user', UserController::class);
  Route::resource('permit', PermitController::class);
  Route::patch('permit/{permit}/approve', ApprovePermitController::class)->name('permit.approve');
  Route::patch('permit/{permit}/reject', RejectPermitController::class)->name('permit.reject');
});

Route::prefix('user')->name('user.')->group(function () {
  Route::get('permit-history', PermitHistoryController::class)->name('permit-history');
  Route::post('permit-request', PermitRequestController::class)->name('permit-request');
});
