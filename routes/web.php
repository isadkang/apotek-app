<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PembelianController;
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

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'home'])->name('home');

/**
 * prefix → digunakan untuk mengelompokkan beberapa routing sehingga 
 * tiap-tiap route didalamnya memiliki prefix (awalan) URL path seperti yang didefinisikan 
 * pada method prefix, begitupun berlaku pada method name nya. Contoh pada line 11 tersebut 
 * berarti ketika user mengakses path /medicine/create maka akan ditangani oleh MedicineController 
 * method create dengan pemanggilan route nya dengan route(’medicine.create’)
 */
Route::prefix('/medicine')->name('medicine.')->group(function () {
    Route::get('/create', [MedicineController::class, 'create'])->name('create');
    Route::post('/store', [MedicineController::class, 'store'])->name('store');
    Route::get('/', [MedicineController::class, 'index'])->name('index');
    Route::get('/{id}/edit', [MedicineController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [MedicineController::class, 'update'])->name('update');
    Route::delete('/{id}', [MedicineController::class, 'destroy'])->name('delete');
    Route::get('/stock', [MedicineController::class, 'stock'])->name('stock');
    Route::get('/data/stock/{id}', [MedicineController::class, 'stockEdit'])->name('stock.edit');
    Route::patch('/data/stock/{id}', [MedicineController::class, 'stockUpdate'])->name('stock.update');
});

Route::prefix('/user')->name('user.')->group(function() {
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/', [UserController::class, 'index'])->name('home');
    Route::get('/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('delete');
});

Route::prefix('/pembelian')->name('pembelian.')->group(function () {
    Route::get('/', [PembelianController::class, 'index'])->name('index');
});