<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsGuest;
use Illuminate\Support\Facades\Route;


Route::middleware('IsGuest')->group(function(){
    //ketika akses link pertamakali di munculin di halaman login
    Route::get('/', function () {
        return view('login');
    })->name('login');
    //menanganu proses submit login 
    Route::post('/login', [UserController::class,'authLogin'])->name('auth-login');
});


Route::middleware('IsLogin')->group(function(){
    Route::get('/logout', [UserController::class, 'logout'
    ])->name('auth-logout');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    

    Route::middleware('IsAdmin')->group(function() {

        // untuk mengelompokkan route-route
        Route::prefix('/medicine')->name('medicine.')->group(function () {
            Route::get('/data', [MedicineController::class, 'index'])->name('data');
            Route::get('/create', [MedicineController::class, 'create'])->name('create');
            Route::post('/store', [MedicineController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
            Route::patch('/update/{id}', [MedicineController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [MedicineController::class, 'destroy'])->name('delete');
            Route::get('/data/stok', [MedicineController::class, 'stockData'])->name('data.stock');
            Route::get('/{id}', [MedicineController::class, 'show'])->name('show');
            Route::patch('/stock/update/{id}', [MedicineController::class, 'updateStock'])->name('stock.update');
        });
        
        Route::prefix('/user')->name('user.')->group(function(){
            Route::get('/', [UserController::class, 'index'])->name('home');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
            Route::get('/data', [UserController::class, 'index'])->name('data');
            Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
            Route::patch('/{id}', [UserController::class, 'update'])->name('update');
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
        });
    });
    Route::middleware('IsKasir')->group(function(){
        Route::prefix('/order')->name('order.')->group(function(){
            Route::get('/', [OrderController::class,'index'])->name('index');
            Route::get('/create',[OrderController::class,'create'])->name('create');
            Route::post('/store',[OrderController::class,'store'])->name('store');
            Route::get('/struk/{id}',[OrderController::class,'strukPembelian'])->name('struk');
            Route::get('/download-pdf/{id}',[OrderController::class,'downloadPDF'])->name('download-pdf');
            Route::get('/search',[OrderController::class,'search'])->name('search');
        });
    });
    
    
    Route::prefix('/admin/order')->name('admin.order.')->group(function(){
        Route::get('/',[OrderController::class, 'data'])->name('data');
        Route::get('/download-excel',[OrderController::class, 'downloadExcel'])->name('download-excel');
        Route::get('/searchAdm',[OrderController::class,'searchAdm'])->name('searchAdm');
    });
    });

// method get = memasukan ke database
// method patch = mengupdate ke database