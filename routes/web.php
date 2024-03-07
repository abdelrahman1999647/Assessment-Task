<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\HistoryPaymentsController;
use App\Http\Controllers\HistoryTreatmentplanController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LabInvoiceController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientProfile;
use App\Http\Controllers\PaymentsController;

use App\Http\Controllers\PicturesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TreatmentPlanController;
use App\Http\Controllers\TreatmentPlanDetailsController;
use App\Models\HistoryTreatmentplan;
use App\Models\TreatmentPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('auth.login');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::resource('albums', AlbumsController::class);
Route::get('/album-profile/{id}', [AlbumsController::class, 'show']);
Route::post('update-album/{id}', [AlbumsController::class , 'update'] )->name('update-album');
Route::resource('pictures', PicturesController::class);


Route::get('/{page}', [AdminController::class, 'index']);





