<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::group(['prefix' => 'employees', 'as' => 'employees.'], function () {
    Route::delete('/{id}/destroy', [EmployeesController::class, 'destroy'])->name('destroy');
    Route::get('/salary', [EmployeesController::class, 'salary']);
    Route::get('/staff', [EmployeesController::class, 'staff']);
    Route::get('/staff2', [EmployeesController::class, 'staff2']);
    Route::get('/get_late_staff', [EmployeesController::class, 'getLateStaff']);
});

Route::group(['prefix' => 'departments', 'as' => 'departments.'], function () {
    Route::delete('/{id}/destroy', [DepartmentsController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'positions', 'as' => 'positions.'], function () {
    Route::delete('/{id}/destroy', [PositionController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
    Route::delete('/{id}/destroy', [AccountController::class, 'destroy'])->name('destroy');
});

Route::post('/reset_password', [AuthController::class, 'recover'])->name('recover');

Route::group(['prefix' => 'benefits', 'as' => 'benefits.'], function () {
    Route::delete('/{id}/destroy', [BenefitController::class, 'destroy'])->name('destroy');
});
