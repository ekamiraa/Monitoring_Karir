<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    $user = \App\Models\User::find(1);
    if (!$user->hasRole('admin')) {
        $user->assignRole('admin');
    }
    return view('Welcome');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');;
    Route::get('employee', [App\Http\Controllers\Admin\EmployeeController::class, 'index']);
    Route::get('import-employee', [App\Http\Controllers\Admin\EmployeeController::class, 'import']);
    Route::post('import-employee', [App\Http\Controllers\Admin\EmployeeController::class, 'importExcelData']);
});

// Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
//     ->middleware(['auth'])
//     ->name('dashboard');

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
