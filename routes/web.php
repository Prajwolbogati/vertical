<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accountController;
use App\Http\Controllers\companyserviceController;
use App\Http\Controllers\hostingController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\servicetypeController;
use App\Http\Controllers\settingController;
use App\Http\Controllers\userController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;

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


// Route::get('inventory.data', function () {
//     return view('webtech.array');
// });


Route::group(['middleware'=>['auth','verified']],function(){



Route::get('/', [EmailVerificationPromptController::class, '__invoke']);


Route::get('/index', [accountController::class, 'index']);



Route::get('newaccount', [accountController::class, 'newAccount']);

Route::post('addaccount', [accountController::class, 'insertdata']);

Route::get('allAccount', [accountController::class, 'allAccount']);

Route::get('exp-15/{stype_id}', [companyserviceController::class, 'Exp15']);

Route::get('all/{stype_id}', [companyserviceController::class, 'all']);

Route::get('exp-7/{stype_id}', [companyserviceController::class, 'Exp7']);

Route::get('expired/{stype_id}', [companyserviceController::class, 'Expired']);

Route::get('deleted/{stype_id}', [companyserviceController::class, 'Deleted']);

Route::get('suspend/{stype_id}', [companyserviceController::class, 'Suspend']);

Route::get('edit-account/{id}', [accountController::class, 'editAccount']);

Route::post('updateaccount/{id?}', [accountController::class, 'updateData']);

Route::post('update/{id}', [accountController::class, 'updateStatus']);

Route::get('newclient', [clientController::class, 'addClient']);

Route::get('newservice', [servicetypeController::class, 'addService']);

Route::post('addservice', [serviceController::class, 'insertdata'])->middleware('role:sales|admin');

Route::get('allClient', [clientController::class, 'allClient']);

Route::get('edit-client/{id}', [clientController::class, 'editClient']);



Route::post('updateclient', [clientController::class, 'updateData']);

Route::post('updatecstatus/{id}', [clientController::class, 'updateclientStatus']);

Route::post('updatesetting', [settingController::class, 'updateData']);

Route::post('addsetting', [settingController::class, 'insertdata']);

Route::post('addclient', [clientController::class, 'insertdata']);

Route::post('addservicetype', [servicetypeController::class, 'insertdata'])->middleware('permission:create permission');;

Route::get('newsetting', [settingController::class, 'addSetting']);

Route::get('allservices', [serviceController::class, 'allService']);

Route::get('edit-service/{id}', [serviceController::class, 'editService']);

Route::get('editrole/{id}', [roleController::class, 'editRole']);

Route::get('edit-servicetype/{id}', [servicetypeController::class, 'editServiceType']);

Route::get('detail/{id}', [accountController::class, 'detailAccount']);

Route::post('updateservice', [serviceController::class, 'updateData']);

Route::post('updaterole/{id}', [roleController::class, 'updateRole']);

Route::post('updateservicetype', [servicetypeController::class, 'updateData']);

Route::post('delete/{id}', [accountController::class, 'Delete']);

Route::get('delete/{id}', [clientController::class, 'deleteClient']);

Route::get('deleterole/{id}', [roleController::class, 'deleteRole']);

Route::get('deleteservice/{id}', [serviceController::class, 'deleteService']);

Route::get('deletestype/{id}', [servicetypeController::class, 'deleteStype']);

Route::get('delete/{id}', [accountController::class, 'delete']);

Route::get('delete/{id}', [companyserviceController::class, 'delete']);

Route::get('exp-15', [accountController::class, 'Exp15']);

Route::get('exp-7', [accountController::class, 'Exp7']);

Route::get('expired', [accountController::class, 'Expired']);

Route::get('deleted', [accountController::class, 'Deleted']);

Route::get('suspend', [accountController::class, 'Suspend']);

Route::get('viewrole', [roleController::class, 'viewRole']);


Route::get('viewuser', [roleController::class, 'viewUser']);

Route::get('addrole', [roleController::class, 'addRole']);

Route::get('profileupdate', [roleController::class, 'profileupdate']);


Route::get('viewinvoice/{id}', [settingController::class, 'viewInvoice']);

Route::post('postRole', [roleController::class, 'store']);

Route::post('send-email-pdf', [PDFController::class, 'pdf']);

Route::get('send', [PDFController::class, 'pdfss']);



// Route::get('send-email', [MailController::class, 'sendEmail']);





});
require __DIR__.'/auth.php';


