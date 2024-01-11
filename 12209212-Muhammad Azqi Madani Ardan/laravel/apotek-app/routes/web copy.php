<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;                                   
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
Route::middleware('IsGuest')->group(function(){

    // ketika akses pertama kali yang dimunculkan halaman login
    Route::get('/', function () {
        return view('login');
    })->name('login');
    // menangani proses submit login
    Route::post('/login',[UserController::class, 'authLogin'] )->name('auth-login');
    
    
});
//  

// setelah login
Route::middleware('IsLogin')->group(function(){


Route::get('/logout',[UserController::class, 'logout'] )->name('auth-logout');

Route::get('/dashboard', function () {
    return view('dashboard');
});

// prrefix : awalan (mengelompokkan url path sesuai dengan fiturnya)
// name prefix : awalan name route pad akelompok url path
// group : mengelompokkan url path
// ::get -> menampilkan halaman, ::post-> menambah data ke db, ::patch -> mengubah data ke db, ::delete -> menghapus data ke db
// NamaController::class, 'namafunction'
// name() -> nama route yg dipanggil di href/action
Route::middleware('IsAdmin')->group(function(){

    Route::prefix('/medicine')->name('medicine.')->group(function() {
        Route::get('/data', [MedicineController::class, 'index'])->name('data');
        Route::get('/create', [MedicineController::class, 'create'])->name('create');
        Route::post('/store', [MedicineController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}',[MedicineController::class, 'update'])->name('update');
        Route::delete('delete/{id}',[MedicineController::class, 'destroy'])->name('delete');
        Route::get('/data/stock',[MedicineController::class, 'stockData'])->name('data.stock');
        Route::get('/{id}',[MedicineController::class, 'show'])->name('show');
        Route::patch('/stock/update/{id}',[MedicineController::class, 'updateStock'])->name('stock.update');
    });
    
    Route::prefix('/user')->name('user.')->group(function() {
        Route::get('/data', [UserController::class, 'index'])->name('data');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/user_data', [UserController::class, 'user_data'])->name('user_data');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/update/{id}',[UserController::class, 'update'])->name('update');
        Route::delete('delete/{id}',[UserController::class, 'destroy'])->name('delete');
        // Route::get('/data/stock',[MedicineController::class, 'stockData'])->name('data.stock');
        // Route::get('/{id}',[MedicineController::class, 'show'])->name('show');
    });
});

Route::middleware('IsKasir')->group(function(){
    Route::prefix('/order')->name('order.')->group(function(){
        Route::get('/',[OrderController::class, 'index'])->name('index');
        Route::get('/create',[OrderController::class,'create'])->name('create');
        Route::post('/store',[OrderController::class,'store'])->name('store');
        Route::get('/struk/{id}',[OrderController::class,'strukPembelian'])->name('struk');
        Route::get('/download-pdf/{id}',[OrderController::class,'downloadPDF'])->name('download-pdf');
        Route::get('/search',[OrderController::class,'search'])->name('search');
    });
});

});






