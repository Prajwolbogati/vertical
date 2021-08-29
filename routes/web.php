<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accountController;
use App\Http\Controllers\companyserviceController;
use App\Http\Controllers\hostingController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\servicetypeController;
use App\Http\Controllers\settingController;

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
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/', [accountController::class, 'index']);

Route::get('/index', [accountController::class, 'index']);

Route::get('newaccount', [accountController::class, 'newAccount']);

Route::post('addaccount', [accountController::class, 'insertdata']);

Route::get('allAccount', [accountController::class, 'allAccount']);

Route::get('exp-15/{stype_id}', [companyserviceController::class, 'Exp15']);

Route::get('exp-7/{stype_id}', [companyserviceController::class, 'Exp7']);

Route::get('expired/{stype_id}', [companyserviceController::class, 'Expired']);

Route::get('deleted/{stype_id}', [companyserviceController::class, 'Deleted']);

Route::get('suspend/{stype_id}', [companyserviceController::class, 'Suspend']);

Route::get('edit-account/{id}', [accountController::class, 'editAccount']);

Route::post('updateaccount', [accountController::class, 'updateData']);

Route::post('update/{id}', [accountController::class, 'updateStatus']);

Route::get('newclient', [clientController::class, 'addClient']);

Route::get('newservice', [servicetypeController::class, 'addService']);

Route::post('addservice', [serviceController::class, 'insertdata']);

Route::get('allClient', [clientController::class, 'allClient']);

Route::get('edit-client/{id}', [clientController::class, 'editClient']);

Route::post('updateclient', [clientController::class, 'updateData']);

Route::post('updatecstatus/{id}', [clientController::class, 'updateclientStatus']);

Route::post('updatesetting', [settingController::class, 'updateData']);

Route::post('addsetting', [settingController::class, 'insertdata']);

Route::post('addclient', [clientController::class, 'insertdata']);

Route::post('addservicetype', [servicetypeController::class, 'insertdata']);

Route::get('newsetting', [settingController::class, 'addSetting']);

Route::get('allservices', [serviceController::class, 'allService']);

Route::get('edit-service/{id}', [serviceController::class, 'editService']);

Route::get('edit-servicetype/{id}', [servicetypeController::class, 'editServiceType']);

Route::get('detail/{id}', [accountController::class, 'detailAccount']);

Route::post('updateservice', [serviceController::class, 'updateData']);

Route::post('updateservicetype', [servicetypeController::class, 'updateData']);






