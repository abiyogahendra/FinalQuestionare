<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\FrontPageController;
use App\Http\Controllers\Frontend\RegistrationController;
use App\Http\Controllers\Frontend\QuestionController;
use App\Http\Controllers\Frontend\ValidationQuestionController;
use App\Http\Controllers\Frontend\SubmitController;


// login
use App\Http\Controllers\Login\LoginController;

// Admin
use App\Http\Controllers\Admin\DashboardAdminController;

use App\Http\Controllers\Modal\ReportIndexController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',[FrontPageController::class,'IndexFrontPage']);
Route::get('/',[IndexController::class,'IndexRegistration']);
Route::post('/input-registrasi',[RegistrationController::class,'InputRegistration']);

Route::get('/question',[QuestionController::class,'QuestionIndex']);
// Route::get('/question-expert',[QuestionController::class,'QuestionIndexExpert']);

Route::post('/validation-question',[ValidationQuestionController::class,'ValidationController']);
Route::post('/back-page-check',[ValidationQuestionController::class,'BackPageCheck']);
Route::post('/submit-data',[SubmitController::class,'SubmitAllData']);


// Login

Route::get('/admin-login',[LoginController::class,'IndexLogin'])->name('index-login');
Route::post('/process-login',[LoginController::class,'LoginAuthentication']);


// admin
	Route::group(['middleware' => ['auth']], function(){
    
    Route::get('/admin-dashboard',[DashboardAdminController::class,'DashboardIndex']);
    Route::get('/data-report-admin',[DashboardAdminController::class,'ReportDataDashboard']);

    // modal
    Route::get('/index-modal-report',[ReportIndexController::class,'IndexModalReport']);

    // report 
    Route::get('/download-report',[ReportIndexController::class,'DownloadReport']);
    Route::get('/download-report-next',[ReportIndexController::class,'DownloadReportV2']);
    Route::post('/upload-images',[ReportIndexController::class,'StoreImage']);


});
