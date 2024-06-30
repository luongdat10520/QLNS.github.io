<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\UserInfoController;
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

Route::get('/admin', function () {
    return view('admin/HomeAdmin');
})->name('admin.index');
Route::get('/user', function () {
    return view('user/user-dashboard');
})->name('user.index');

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('checkLogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/password/change', [AuthController::class, 'change'])->name('passwordindex');
Route::post('/password/change', [AuthController::class, 'update']);
Route::get('/reset_password', [AuthController::class, 'reset_password'])->name('reset');

#report
Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
    Route::get('/salary', [ReportController::class, 'salary'])->name('salary');
    Route::get('/salary/export', [ReportController::class, 'export'])->name('salary.export');
    Route::get('/latestaff', [ReportController::class, 'latestaff'])->name('latestaff');
});

#employees
Route::group(['prefix' => 'employees', 'as' => 'employees.'], function () {
    Route::get('/', [EmployeesController::class, 'index'])->name('index');
    Route::get('/{id}/show', [EmployeesController::class, 'show'])->name('show');
    Route::get('/create', [EmployeesController::class, 'create'])->name('create');
    Route::post('/store', [EmployeesController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [EmployeesController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [EmployeesController::class, 'update'])->name('update');
    Route::get('/search_user', [EmployeesController::class, 'search_user'])->name('search_user');
    Route::get('/export', [EmployeesController::class, 'export'])->name('export');
});

#departments
Route::group(['prefix' => 'departments', 'as' => 'departments.'], function () {
    Route::get('/', [DepartmentsController::class, 'index'])->name('index');
    Route::get('/{id}/show', [DepartmentsController::class, 'show'])->name('show');
    Route::get('/create', [DepartmentsController::class, 'create'])->name('create');
    Route::post('/store', [DepartmentsController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [DepartmentsController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [DepartmentsController::class, 'update'])->name('update');
});

#accounts
Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::get('/{id}/show', [AccountController::class, 'show'])->name('show');
    Route::get('/create', [AccountController::class, 'create'])->name('create');
    Route::post('/store', [AccountController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AccountController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [AccountController::class, 'update'])->name('update');
});

#positions
Route::group(['prefix' => 'positions', 'as' => 'positions.'], function () {
    Route::get('/', [PositionController::class, 'index'])->name('index');
    Route::get('/{id}/show', [PositionController::class, 'show'])->name('show');
    Route::get('/create', [PositionController::class, 'create'])->name('create');
    Route::post('/store', [PositionController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PositionController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [PositionController::class, 'update'])->name('update');
});

#statistics
Route::group(['prefix' => 'statistics', 'as' => 'statistics.'], function () {
    Route::get('/', [StatisticController::class, 'index'])->name('index');
});

#attendance
Route::group(['prefix' => 'attendances', 'as' => 'attendances.'], function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('index');
    Route::get('/create', [AttendanceController::class, 'create'])->name('create');
    Route::post('/store', [AttendanceController::class, 'store'])->name('store');
    Route::get('/list', [AttendanceController::class, 'attendance'])->name('attendance');
});

#userinfo
Route::group(['prefix' => 'info', 'as' => 'info.'], function () {
    Route::get('/me', [UserInfoController::class, 'show'])->name('show');
    Route::get('/edit', [UserInfoController::class, 'edit'])->name('edit');
    Route::post('/update', [UserInfoController::class, 'update'])->name('update');
});

#benefit
Route::group(['prefix' => 'benefits', 'as' => 'benefits.'], function () {
    Route::get('/', [BenefitController::class, 'index'])->name('index');
    Route::get('/{id}/show', [BenefitController::class, 'show'])->name('show');
    Route::get('/create', [BenefitController::class, 'create'])->name('create');
    Route::post('/store', [BenefitController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [BenefitController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [BenefitController::class, 'update'])->name('update');
    Route::get('/me', [BenefitController::class, 'list'])->name('list');
});
