<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/employees/json', 'EmployeeControllerAPI@employeesJson')->name('employees.json');
Route::get('/employees/company', 'EmployeeControllerAPI@searchCompanies')->name('employees.search.companies');
Route::apiResource('employees', 'EmployeeControllerAPI');
