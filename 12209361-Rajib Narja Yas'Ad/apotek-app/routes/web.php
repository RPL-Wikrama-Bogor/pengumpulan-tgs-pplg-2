<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware('IsGuest')->group(function() {
// ketika akses link pertama kali ditampilkan halaman login
Route::get('/', function() {
    return view('login');
})->name('login'); 
// menangani proses submit login
Route::post('/login', [UserController::class, 'authLogin'])->name('auth-login'); 
});


Route::middleware('IsLogin')->group(function(){    
    Route::get('/logout', [UserController::class, 'logout'])->name('auth-logout');
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::middleware('IsAdmin')->group(function() {
// prefix : awalan (mengelompokan url path sesuai dengan fiturnya)
// name prefix : awalan name route pada kelompok url path
// ::get ->menampilkan halaman, ::post ->menambah data ke db, ::patch -> mengubah data ke db,
// ::delete -> menghapus data ke db
// NamaController::class, 'namafunction'

        route::prefix('/medicine')->name('medicine.')->group(function() {
            route::get('/data',[MedicineController::class, 'index'])->name('data');
            route::get('/create', [MedicineController::class, 'create'])->name('create');
            route::post('store', [MedicineController::class, 'store'])->name('store');
            // {} -> path dinamis/parameter path : untuk mengirim data identitas yang akan diambil datanya harus diisi ketika pemanggilan nama route
            route::get('/edit{id}', [MedicineController::class, 'edit'])->name('edit');
            route::patch('/update{id}', [MedicineController::class, 'update'])->name('update');
            route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('/data/stock', [MedicineController::class, 'stockData'])->name('data.stock');
            Route::get('/{id}', [MedicineController::class, 'show'])->name('show');
            Route::patch('/stock/update/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
        });
        route::prefix('/user')->name('user.')->group(function () {
            route::get('/data',[UserController::class, 'index'])->name('data');
            route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
            route::patch('/update/{id}', [UserController::class, 'update'])->name('update');
            route::get('/create', [UserController::class, 'create'])->name('create');
            route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
            route::post('store', [UserController::class, 'store'])->name('store');
        }); 
        route::prefix('/admin/order')->name('admin.order.')->group(function (){
            route::get('/', [OrderController::class, 'data'])->name('data');

        route::get('/download-excel', [OrderController::class, 'downloadExcel'])->name('download-excel');

        Route::get('/searchAdmin', [OrderController::class, 'SearchOrderDate'])->name('searchAdmin');
        
        });
    });

    route::middleware('IsKasir')->group(function () {
        route::prefix('/order')->name('order.')->group(function () {
            route::get('/', [OrderController::class, 'index'])->name('index');
            route::get('/create', [OrderController::class, 'create'])->name('create');
            route::post('/store', [OrderController::class, 'store'])->name('store');
            Route::get('/struk/{id}', [OrderController::class, 'strukPembelian'])->name('struk');
            Route::get('/download/{id}', [OrderController::class, 'downloadPDF'])->name('download');
            Route::get('/search', [OrderController::class, 'SearchOrderDate'])->name('search');
        });
    });
});