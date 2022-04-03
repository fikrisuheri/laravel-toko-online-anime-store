<?php

use App\Http\Controllers\Backend\Master\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

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
                Route::get('/create',[CategoryController::class,'create'])->name('create');
                Route::post('/create',[CategoryController::class,'store'])->name('store');
            });

        });

    });

});

require __DIR__ . '/auth.php';
