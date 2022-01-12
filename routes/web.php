<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified','check'])->name('dashboard');

Route::group(['middleware'=>['auth','verified']],function (){
    Route::resource('users', UserController::class);
});

Route::put('/StatusChange/{user}', [StatusController::class,'update'])->name('StatusChange');

Route::get('/disable', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('disable');

    require __DIR__.'/auth.php';
