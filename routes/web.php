<?php

use App\Http\Controllers\Backend\Feature\OrderController;
use App\Http\Controllers\Backend\Master\CategoryController;
use App\Http\Controllers\Backend\Master\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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


Route::prefix('app')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('dashboard', function () {
            return view('backend.dashboard');
        })->name('dashboard');

        Route::prefix('user')->name('user.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('/create', [UserController::class, 'create'])->name('create');
            Route::post('/store', [UserController::class, 'store'])->name('store');
        });

        Route::prefix('master')->name('master.')->group(function(){
            
            Route::prefix('category')->name('category.')->group(function(){
                Route::get('/',[CategoryController::class,'index'])->name('index');
                Route::get('/create',[CategoryController::class,'create'])->name('create');
                Route::post('/create',[CategoryController::class,'store'])->name('store');
                Route::get('/delete/{id}',[CategoryController::class,'delete'])->name('delete');
            });

            Route::prefix('product')->name('product.')->group(function(){
                Route::get('/',[ProductController::class,'index'])->name('index');
                Route::get('/create',[ProductController::class,'create'])->name('create');
                Route::post('/create',[ProductController::class,'store'])->name('store');
            });

        });

        Route::prefix('feature')->name('feature.')->group(function(){

            Route::prefix('order')->name('order.')->group(function(){
                Route::get('/{status?}',[OrderController::class,'index'])->name('index');
            });

        });

    });

});

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/{categoriSlug}/{productSlug}',[FrontendProductController::class,'show'])->name('product.show');

require __DIR__ . '/auth.php';
