<?php

use App\Http\Controllers\ChangapswController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UsersController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('users',UsersController::class);
Route::resource('countries', CountryController::class);
Route::resource('states',StateController::class);
Route::resource('cities',CityController::class);
Route::resource('departements',DepartementController::class);
// Route::resource('employees', EmployeController::class);
Route::post('users/{user}/change-password',[ChangapswController::class,'change'])->name('users.change.password');



/*any in url redirect to the home page*/
Route::get('{any}',function(){
    return view('employees.index');
})->where('any','.*');

