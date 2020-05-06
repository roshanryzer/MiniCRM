<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::post('/dashboard/sort', 'DashboardController@sort')->name('dashboard.sort');
    Route::get('/dashboard/companies-list', 'DashboardController@companies')->name('dashboard.companies-list');
    Route::get('/dashboard/employees-list', 'DashboardController@employees')->name('dashboard.employees-list');

    Route::get('/companies/json', 'CompanyController@companiesJson')->name('companies.json');
    Route::post('/companies/update-company/', 'CompanyController@update')->name('companies.update.company');
    Route::resource('/companies', 'CompanyController');

    Route::get('/employees', 'EmployeeController')->name('employees.index');
});

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', 'HomeController@index')->name('home');
