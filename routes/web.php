<?php

use App\Http\Controllers\EnviarController;
use App\Http\Controllers\TStoreController;
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
    return view('ejemplo');
});

Route::get('ejemplo', [EnviarController::class, 'index']);
Route::get('registrar-tienda', [TStoreController::class, 'index'])->name('tienda');
Route::get('registrar-supervisor', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('registrar-terminal', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('terminal');
Route::get('list-stores', [TStoreController::class, 'listsStore']);
Route::get('/send-store', [EnviarController::class, 'Sendstore']);
Route::get('/employee-store/{token}', [EnviarController::class, 'SendEmployeeStore']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('ejemplo-store', [EnviarController::class, 'store'])->name('send-store');
Route::post('save-store', [TStoreController::class, 'store']);
Route::post('save-employee', [\App\Http\Controllers\EmployeeController::class, 'store']);
Route::post('ejemplo-store', [EnviarController::class, 'store'])->name('send-store');
