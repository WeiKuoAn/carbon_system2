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
Route::get('customer/data', [App\Http\Controllers\CustomerController::class,'customer_data'])->name('customer.data');
Route::resource('customer', App\Http\Controllers\CustomerController::class);
Route::resource('industry-category', App\Http\Controllers\IndustryCategoryController::class);
Route::resource('user', App\Http\Controllers\UserController::class);

Route::get('branch/datas', [App\Http\Controllers\BranchController::class,'branch_datas'])->name('branch.datas');
Route::get('branch/data', [App\Http\Controllers\BranchController::class,'branch_data'])->name('branch.data');
Route::resource('branches', App\Http\Controllers\BranchController::class);
Route::resource('inspection', App\Http\Controllers\InspectionhController::class);

Route::get('simulation-inspection/step1', [App\Http\Controllers\SimulationInspectionController::class,'step1'])->name('simulation-inspection.step1');
Route::post('simulation-inspection/step1', [App\Http\Controllers\SimulationInspectionController::class,'step1_store'])->name('simulation-inspection.step1.store');
Route::get('simulation-inspection/step2', [App\Http\Controllers\SimulationInspectionController::class,'step2'])->name('simulation-inspection.step2');
Route::post('simulation-inspection/step2', [App\Http\Controllers\SimulationInspectionController::class,'step2_store'])->name('simulation-inspection.step2.store');
Route::get('simulation-inspection/step3', [App\Http\Controllers\SimulationInspectionController::class,'step3'])->name('simulation-inspection.step3');
Route::post('simulation-inspection/step3', [App\Http\Controllers\SimulationInspectionController::class,'step3_store'])->name('simulation-inspection.step3.store');

Route::resource('simulation-inspection', App\Http\Controllers\SimulationInspectionController::class);

Route::resource('emission', App\Http\Controllers\EmissionController::class);

Route::resource('carbon_system_demo', App\Http\Controllers\carbon_system_demoController::class);
Route::resource('scope', App\Http\Controllers\ScopeController::class);
Route::resource('iso14064', App\Http\Controllers\Iso14064Controller::class);
Route::resource('ghg_protocol', App\Http\Controllers\GhgProtocolController::class);
Route::resource('device', App\Http\Controllers\DeviceController::class);
// Route::get('/inspection', [App\Http\Controllers\InspectionhController::class, 'root']);

//上傳檔案
Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');