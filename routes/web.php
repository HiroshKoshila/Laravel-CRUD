<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\InsertController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CourseController;

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

route::get('/',[HomeController::class,'index'])->name('home');
route::get('/dash',[DashController::class,'dash'])->name('dash');

route::prefix('/insert')->group(function(){
    route::get('/',[InsertController::class,'insert'])->name('insert');
    route::post('/store',[InsertController::class,'store'])->name('insert.store');
    route::get('/edit',[InsertController::class,'edit'])->name('insert.edit');
    route::post('/{it_id}/update',[InsertController::class,'update'])->name('insert.update');
    route::get('/{it_id}/delete',[InsertController::class,'delete'])->name('insert.delete');
    route::get('/{it_id}/active',[InsertController::class,'active'])->name('insert.active');
});

route::prefix('/banner')->group(function(){
    route::get('/',[BannerController::class,'insert'])->name('banner');
    route::post('/store',[BannerController::class,'store'])->name('banner.store');
    route::get('/{banner_id}/delete',[BannerController::class,'delete'])->name('banner.delete');
    route::get('/{banner_id}/status',[BannerController::class,'status'])->name('banner.status');
});

route::prefix('/course')->group(function(){
    route::get('/',[CourseController::class,'index'])->name('course');
    route::get('/create',[CourseController::class,'create'])->name('course.create');
    route::post('/store',[CourseController::class,'store'])->name('course.store');
    route::get('/edit/{id}',[CourseController::class,'edit'])->name('course.edit');
    route::get('/delete/{id}',[CourseController::class,'delete'])->name('course.delete');
    route::post('/update/{id}',[CourseController::class,'update'])->name('course.update');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


