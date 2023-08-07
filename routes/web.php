<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\academicController;
use App\Http\Controllers\activityController;
use App\Http\Controllers\mapController;
use App\Http\Controllers\rightsController;
use App\Http\Controllers\locationController;
use App\Http\Controllers\imageController;


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

Route::get('/', function () {
    return redirect('login');
});

Route::controller(AuthController::class)->group(function(){
    //Route::get('register','register')->middleware('nowlogin');
    //Route::post('register-user','registerUser')->name('register.user');

    Route::get('login','login')->middleware('nowlogin');
    Route::post('login-user','loginUser')->name('login.user')->middleware('nowlogin');

    Route::get('dashboard','dashboard')->middleware('checklogin');
    Route::get('logout','logout');

});

//////rights
Route::get('admin/add-rights',[rightsController::class,'addimg'])->middleware('checklogin');
Route::post('admin/add-rights',[rightsController::class,'storeimg'])->name('rights.store')->middleware('checklogin');
Route::get('admin/edit-rights/{id}',[rightsController::class,'editimg'])->middleware('checklogin');
Route::get('admin/all-rights',[rightsController::class,'imgs'])->middleware('checklogin');
Route::post('admin/update-rights',[rightsController::class,'updateimg'])->name('rights.update')->middleware('checklogin');
Route::get('admin/delete-rights/{id}',[rightsController::class,'deleteimg'])->name('rights.delete')->middleware('checklogin');

/////activity
Route::get('admin/add-activity',[activityController::class,'addimg'])->middleware('checklogin');
Route::post('admin/add-activity',[activityController::class,'storeimg'])->name('activity.store')->middleware('checklogin');
Route::get('admin/edit-activity/{id}',[activityController::class,'editimg'])->middleware('checklogin');
Route::get('admin/all-activity',[activityController::class,'imgs'])->middleware('checklogin');
Route::post('admin/update-activity',[activityController::class,'updateimg'])->name('activity.update')->middleware('checklogin');
Route::get('admin/delete-activity/{id}',[activityController::class,'deleteimg'])->name('activity.delete')->middleware('checklogin');


///academic
Route::get('admin/add-academic',[academicController::class,'addimg'])->middleware('checklogin');
Route::post('admin/add-academic',[academicController::class,'storeimg'])->name('academic.store')->middleware('checklogin');
Route::get('admin/edit-academic/{id}',[academicController::class,'editimg'])->middleware('checklogin');
Route::get('admin/all-academic',[academicController::class,'imgs'])->middleware('checklogin');
Route::post('admin/update-academic',[academicController::class,'updateimg'])->name('academic.update')->middleware('checklogin');
Route::get('admin/delete-academic/{id}',[academicController::class,'deleteimg'])->name('academic.delete')->middleware('checklogin');

/////map
Route::get('admin/add-map',[mapController::class,'addimg'])->middleware('checklogin');
Route::post('admin/add-map',[mapController::class,'storeimg'])->name('map.store')->middleware('checklogin');
Route::get('admin/edit-map/{id}',[mapController::class,'editimg'])->middleware('checklogin');
Route::get('admin/all-map',[mapController::class,'imgs'])->middleware('checklogin');
Route::post('admin/update-map',[mapController::class,'updateimg'])->name('map.update')->middleware('checklogin');
Route::get('admin/delete-map/{id}',[mapController::class,'deleteimg'])->name('map.delete')->middleware('checklogin');

/////location
Route::get('admin/add-location',[locationController::class,'addimg'])->middleware('checklogin');
Route::post('admin/add-location',[locationController::class,'storeimg'])->name('location.store')->middleware('checklogin');
Route::get('admin/edit-location/{id}',[locationController::class,'editimg'])->middleware('checklogin');
Route::get('admin/all-location',[locationController::class,'imgs'])->middleware('checklogin');
Route::post('admin/update-location',[locationController::class,'updateimg'])->name('location.update')->middleware('checklogin');
Route::get('admin/delete-location/{id}',[locationController::class,'deleteimg'])->name('location.delete')->middleware('checklogin');

///////image
Route::get('admin/add-image',[imageController::class,'addimg'])->middleware('checklogin');
Route::post('admin/add-image',[imageController::class,'storeimg'])->name('image.store')->middleware('checklogin');
Route::get('admin/edit-image/{id}',[imageController::class,'editimg'])->middleware('checklogin');
Route::get('admin/all-image',[imageController::class,'imgs'])->middleware('checklogin');
Route::post('admin/update-image',[imageController::class,'updateimg'])->name('image.update')->middleware('checklogin');
Route::get('admin/delete-image/{id}',[imageController::class,'deleteimg'])->name('image.delete')->middleware('checklogin');

