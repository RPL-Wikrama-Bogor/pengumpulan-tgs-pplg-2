<?php

use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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
    return view('dashboard');

    //ketika membukai ip yg 18 /ribu akan memabggi view yang namanya wlcoe
});

Route::prefix('/medicine')->name('medicine.')->group(function() {
    Route::get('/stock', [MedicineController::class, 'stock'])->name('stock');
    Route::get('/create', [MedicineController::class, 'create'])->name('create');
    Route::post('/store', [MedicineController::class, 'store'])->name('store');
    Route::get('/', [MedicineController::class, 'index'])->name('home');
    Route::get('/edit/{id}', [MedicineController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [MedicineController::class, 'update'])->name('update');
    Route::delete('/{id}', [MedicineController::class, 'destroy'])->name('delete');
    Route::get('/data/stock/{id}', [MedicineController::class, 'stockEdit'])->name('stock.edit');
    Route::patch('/data/stock/{id}', [MedicineController::class, 'stockUpdate'])->name('stock.update');
    Route::get('/{id}', [MedicineController::class, 'show'])->name('show');

});

Route::prefix('/user')->name('user.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [UserController::class, 'hapus'])->name('hapus');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
});