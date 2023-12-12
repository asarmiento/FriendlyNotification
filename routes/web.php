<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EnviarController;
use App\Http\Controllers\TStoreController;
use App\Http\Controllers\TTerminalController;
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



Route::get('/', function (){
    return redirect()->route('login');
});
Route::get('/terminal/{terminal}', [EnviarController::class, 'index'])->name("inicio");
Route::get('registrar-tienda', [TStoreController::class, 'index'])->name('tienda');
Route::get('registrar-supervisor', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('registrar-terminal', [\App\Http\Controllers\TTerminalController::class, 'index'])->name('terminal');



Route::get('list-stores', [TStoreController::class, 'listsStore']);
Route::get('list-employees', [EmployeeController::class, 'listsStore']);
Route::get('list-terminals', [TTerminalController::class, 'listsStore']);
Route::get('list-code-terminal/{store}', [TTerminalController::class, 'codeTerminal']);


Route::get('/send-params', [EnviarController::class, 'sendParams']);
Route::get('/send-store', [EnviarController::class, 'Sendstore']);


Route::post('terminal/send-message-employee', [EnviarController::class, 'SendEmployeeStore']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('ejemplo-store', [EnviarController::class, 'store'])->name('send-store');
Route::post('save-store', [TStoreController::class, 'store']);
Route::post('save-employee', [EmployeeController::class, 'store']);
Route::post('save-terminal', [TTerminalController::class, 'store']);
Route::post('ejemplo-store', [EnviarController::class, 'store'])->name('send-store');
