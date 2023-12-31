<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeImportController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/employee', [EmployeeImportController::class, 'import']);

Route::controller(EmployeeController::class)->group( function () {
    Route::get('/employee', 'index');
    Route::get('/employee/{id}', 'show');
    Route::delete('/employee/{id}', 'destroy');
});
