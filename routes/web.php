<?php

use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkPositionController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('brands', BrandsController::class);
    Route::resource('workPositions', WorkPositionController::class);
    Route::resource('paymentMethods', PaymentMethodController::class);
    Route::resource('users', UserController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('products', ProductController::class);
    Route::group(['prefix' => 'purchases'], function () {
        Route::get('/', [TransactionController::class, 'purchaseIndex'])
            ->name('purchases.index');
        Route::get('show', [TransactionController::class, 'purchaseShow'])
            ->name('purchases.show');
    });

    Route::group(['prefix' => 'sells'], function () {
        Route::get('/', [TransactionController::class, 'sellIndex'])
            ->name('sells.index');
        Route::get('show', [TransactionController::class, 'sellShow'])
            ->name('sells.show');
    });

    Route::get('bitacoras', [BitacoraController::class, 'index'])->name('bitacora.index');
});

Route::get('catalogos', [ProductController::class, 'catalogo'])->name('catalogo.index');
