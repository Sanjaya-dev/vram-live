<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashbordController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\ItemController as AdminItemController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Front\DetailController;
use App\Http\Controllers\Front\LandingController;

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

Route::name('front.')->group(function(){
    Route::get('/',[LandingController::class,'index'])->name('index');
    Route::get('/detail/{slug}',[DetailController::class,'index'])->name('detail');
});

// prefix untuk memberikan admin pada setiap url "/admin/dashbord"
// name
Route::prefix('admin')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
    Route::get('/dashboard', [AdminDashbordController::class,'index'])->name('dashboard'); //memanggil satuan controller biasa
    Route::resource('brands',AdminBrandController::class); //memanggil crud atau controller resource
    Route::resource('types',AdminTypeController::class);
    Route::resource('items',AdminItemController::class);
    Route::resource('bookings',AdminBookingController::class);
});
