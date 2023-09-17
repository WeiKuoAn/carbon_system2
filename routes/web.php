<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'root']);
// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::resource('customer', App\Http\Controllers\CustomerController::class);
Route::resource('industry-category', App\Http\Controllers\IndustryCategoryController::class);
Route::resource('user', App\Http\Controllers\UserController::class);
Route::resource('branches', App\Http\Controllers\BranchController::class);
Route::resource('inspection', App\Http\Controllers\InspectionhController::class);
Route::resource('simulation-inspection', App\Http\Controllers\SimulationInspectionController::class);
Route::resource('carbon_system_demo', App\Http\Controllers\carbon_system_demoController::class);
// Route::get('/inspection', [App\Http\Controllers\InspectionhController::class, 'root']);

//上傳檔案
Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');