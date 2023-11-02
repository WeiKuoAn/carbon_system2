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

//廠商問卷查看
Route::get('customer/{id}/surveys', [App\Http\Controllers\CustomerSurveyController::class , 'index'])->name('cust.surveys.index');
Route::get('customer/{id}/surveys/{survey_id}/create', [App\Http\Controllers\CustomerSurveyController::class , 'create'])->name('cust.surveys.create');
Route::post('customer/{id}/surveys/{survey_id}/store', [App\Http\Controllers\CustomerSurveyController::class , 'store'])->name('cust.surveys.store');
Route::get('customer/{id}/surveys/{survey_id}/edit', [App\Http\Controllers\CustomerSurveyController::class , 'edit'])->name('cust.surveys.edit');
Route::put('customer/{id}/surveys/{survey_id}/update', [App\Http\Controllers\CustomerSurveyController::class , 'update'])->name('cust.surveys.update');


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
Route::get('simulation-inspection/step4', [App\Http\Controllers\SimulationInspectionController::class,'step4'])->name('simulation-inspection.step4');
Route::get('simulation-inspection/step5', [App\Http\Controllers\SimulationInspectionController::class,'step5'])->name('simulation-inspection.step5');
Route::get('simulation-inspection/step6', [App\Http\Controllers\SimulationInspectionController::class,'step6'])->name('simulation-inspection.step6');
Route::post('simulation-inspection/step6', [App\Http\Controllers\SimulationInspectionController::class,'step6_store'])->name('simulation-inspection.step6.store');

Route::get('simulation-inspection/step1/{id}/edit', [App\Http\Controllers\SimulationInspectionEditController::class,'step1_show'])->name('simulation-inspection-edit.step1.show');
Route::post('simulation-inspection/step1/{id}/edit', [App\Http\Controllers\SimulationInspectionEditController::class,'step1_update'])->name('simulation-inspection-edit.step1.update');
Route::get('simulation-inspection/step2/{id}/edit', [App\Http\Controllers\SimulationInspectionEditController::class,'step2_show'])->name('simulation-inspection-edit.step2.show');
Route::post('simulation-inspection/step2/{id}/edit', [App\Http\Controllers\SimulationInspectionEditController::class,'step2_update'])->name('simulation-inspection-edit.step2.update');
Route::get('simulation-inspection/step3/{id}/edit', [App\Http\Controllers\SimulationInspectionEditController::class,'step3_show'])->name('simulation-inspection-edit.step3.show');
Route::get('simulation-inspection/step4/{id}/edit', [App\Http\Controllers\SimulationInspectionEditController::class,'step4_show'])->name('simulation-inspection-edit.step4.show');
Route::get('simulation-inspection/step5/{id}/edit', [App\Http\Controllers\SimulationInspectionEditController::class,'step5_show'])->name('simulation-inspection-edit.step5.show');
Route::get('simulation-inspection/step6/{id}/edit', [App\Http\Controllers\SimulationInspectionEditController::class,'step6_show'])->name('simulation-inspection-edit.step6.show');
// Route::post('simulation-inspection/step3/{id}/edit', [App\Http\Controllers\SimulationInspectionEditController::class,'step3_update'])->name('simulation-inspection-edit.step3.update');

//scope
Route::get('iso14064/datas', [App\Http\Controllers\SimulationInspectionController::class,'iso14064_datas'])->name('iso14064.datas');
Route::get('ghg/datas', [App\Http\Controllers\SimulationInspectionController::class,'ghg_datas'])->name('ghg.datas');
Route::resource('simulation-inspection', App\Http\Controllers\SimulationInspectionController::class);

Route::resource('emission', App\Http\Controllers\EmissionController::class);

Route::get('emission_item/datas', [App\Http\Controllers\EmissionItemController::class , 'emission_item_datas'])->name('emission_item.datas');
Route::resource('emission_item', App\Http\Controllers\EmissionItemController::class);


Route::resource('carbon_system_demo', App\Http\Controllers\carbon_system_demoController::class);
Route::resource('scope', App\Http\Controllers\ScopeController::class);
Route::resource('iso14064', App\Http\Controllers\Iso14064Controller::class);
Route::resource('ghg_protocol', App\Http\Controllers\GhgProtocolController::class);
Route::resource('device', App\Http\Controllers\DeviceController::class);
// Route::get('/inspection', [App\Http\Controllers\InspectionhController::class, 'root']);

Route::resource('source', App\Http\Controllers\sourceController::class);
Route::resource('process', App\Http\Controllers\processController::class);

Route::resource('survey', App\Http\Controllers\SurveyController::class);

//問卷選項設定
Route::get('survey/questions/{id}', [App\Http\Controllers\QuestionController::class , 'index'])->name('survey.questions.index');
Route::get('survey/questions/{id}/create', [App\Http\Controllers\QuestionController::class , 'create'])->name('survey.questions.create');
Route::post('survey/questions/{id}/store', [App\Http\Controllers\QuestionController::class , 'store'])->name('survey.questions.store');
Route::get('survey/questions/{id}/edit', [App\Http\Controllers\QuestionController::class , 'edit'])->name('survey.questions.edit');
Route::post('survey/questions/{id}/update', [App\Http\Controllers\QuestionController::class , 'update'])->name('survey.questions.update');
Route::get('survey/questions/{id}/preview', [App\Http\Controllers\SurveyController::class , 'preview'])->name('survey.questions.preview');
Route::get('survey/questions/{id}/default/create', [App\Http\Controllers\SurveyDefaultController::class , 'create'])->name('survey.questions.default');
Route::post('survey/questions/{id}/default/create', [App\Http\Controllers\SurveyDefaultController::class , 'store'])->name('survey.questions.default.create');
Route::get('survey/questions/{id}/default/edit', [App\Http\Controllers\SurveyDefaultController::class , 'edit'])->name('survey.questions.default.edit');
Route::post('survey/questions/{id}/default/edit', [App\Http\Controllers\SurveyDefaultController::class , 'update'])->name('survey.questions.default.update');


Route::post('/source/{id}', [App\Http\Controllers\sourceController::class, 'update'])->name('source.update');
Route::post('/source/{id}', [App\Http\Controllers\sourceController::class, 'destroy'])->name('source.destroy');
Route::post('/process/{id}', [App\Http\Controllers\processController::class, 'update'])->name('process.update');
Route::post('/process/{id}', [App\Http\Controllers\sourceController::class, 'destroy'])->name('process.destroy');

//上傳檔案
Route::post('/upload', [FileUploadController::class, 'upload'])->name('upload');


Route::get('/process_emission/{id}', [App\Http\Controllers\ExcelImportController::class,'index'])->name('process_emission.index');
Route::get('/process_emission/{id}/data/{process_emission_id}', [App\Http\Controllers\ExcelImportController::class,'show'])->name('process_emission.data');

Route::get('/process_emission/{id}/{branch_id}/{year}/data', [App\Http\Controllers\ExcelImportController::class,'process_emission_ajax'])->name('process_emission.ajax.data');//ajax取得

Route::get('/process_emission/{id}/reduction/{process_emission_id}', [App\Http\Controllers\ExcelImportController::class,'reduction_show'])->name('process_emission.reduction');
Route::get('/import/{id}', [App\Http\Controllers\ExcelImportController::class,'showImportForm'])->name('process_emission.import');
Route::post('/import/{id}', [App\Http\Controllers\ExcelImportController::class,'import'])->name('process_emission.import.data');
