<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StatusProductController;
use App\Http\Controllers\VitrinaController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified','check'])->name('dashboard');

Route::group(['middleware'=>['auth','verified']],function (){
    Route::resource('users', UserController::class);
});

Route::put('/StatusChange/{user}', [StatusController::class,'update'])->name('StatusChange');

Route::put('/StatusProduct/{product}', [StatusProductController::class,'update'])->name('StatusProduct');

Route::get('/catalogo', [VitrinaController::class,'vitrina'])->name('catalogo');

Route::get('/disable', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('disable');

    require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function() {
     Route::resource('roles', RolController::class);
     Route::resource('users', UserController::class); 
     Route::resource('products', ProductController::class);
});


