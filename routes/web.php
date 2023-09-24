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

Route::get('simulation-inspection/step1', [App\Http\Controllers\SimulationInspectionController::class,'step1'])->name('simulation-inspection.step1');
Route::get('simulation-inspection/step2', [App\Http\Controllers\SimulationInspectionController::class,'step2'])->name('simulation-inspection.step2');
Route::resource('simulation-inspection', App\Http\Controllers\SimulationInspectionController::class);

Route::resource('carbon_system_demo', App\Http\Controllers\carbon_system_demoController::class);
Route::resource('ipcc_report', App\Http\Controllers\ipcc_reportController::class);
Route::resource('source', App\Http\Controllers\sourceController::class);
Route::resource('process', App\Http\Controllers\processController::class);
Route::post('/source/{id}', [App\Http\Controllers\sourceController::class, 'update'])->name('source.update');
Route::post('/source/{id}', [App\Http\Controllers\sourceController::class, 'destroy'])->name('source.destroy');
Route::post('/process/{id}', [App\Http\Controllers\processController::class, 'update'])->name('process.update');
Route::post('/process/{id}', [App\Http\Controllers\sourceController::class, 'destroy'])->name('process.destroy');



// Route::get('/source/{id}', [App\Http\Controllers\sourceController::class, 'edit'])->name('source.edit');


// Route::get('/inspection', [App\Http\Controllers\InspectionhController::class, 'root']);

//上傳檔案
Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');