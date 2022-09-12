<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CountryCityController;
use App\Http\Controllers\CityZipcodeController;
use App\Http\Controllers\ZipcodeStreetController;

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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('companies/page',[CompanyController::class,'data'])->name('company.data');

Route::resource('companies',CompanyController::class);
Route::get('employees/page',[EmployeeController::class,'data'])->name('employee.data');
Route::resource('employees',EmployeeController::class);

Route::resource('countries',CountryController::class);
Route::resource('country_cities',CountryCityController::class);
Route::resource('cityzipcodes',CityZipcodeController::class)->parameters(['cityzipcodes' => 'zipcode']);
Route::resource('zipcodes',ZipcodeStreetController::class)->parameters(['zipcodes'=>'zipcodeStreet']);
