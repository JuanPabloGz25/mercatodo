<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Exports\ProductsExportController;
use App\Http\Controllers\Exports\RemittancesExportController;
use App\Http\Controllers\Exports\UsersExportController;
use App\Http\Controllers\Imports\ProductsImportController;
use App\Http\Controllers\Invoices\AdminInvoicesController;
use App\Http\Controllers\News\CurrentlyNewsController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\News\StatusNewsController;
use App\Http\Controllers\Permissions\RolController;
use App\Http\Controllers\Products\ProductController;
use App\Http\Controllers\Products\StatusProductController;
use App\Http\Controllers\Products\VitrinaController;
use App\Http\Controllers\Remittances\RemittanceController;
use App\Http\Controllers\Remittances\TryRemittanceController;
use App\Http\Controllers\ShoppingCart\CartController;
use App\Http\Controllers\Users\StatusController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

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

Route::put('/StatusNew/{news}', [StatusNewsController::class,'update'])->name('StatusNew');

Route::get('/catalogo', [VitrinaController::class,'vitrina'])->name('catalogo');

Route::get('/pagos', [AdminInvoicesController::class,'index'])->name('pagos');

Route::get('/actualidad', [CurrentlyNewsController::class,'currently'])->name('actualidad');

Route::get('/exports', [ProductsExportController::class,'index'])->name('exports');

Route::get('/exportsProducts', [ProductsExportController::class,'export'])->name('export.products');

Route::get('/exportsRemittances', [RemittancesExportController::class,'export'])->name('export.remittances');

Route::get('/exportsUsers', [UsersExportController::class,'export'])->name('export.users');

Route::get('/imports', [ProductsImportController::class,'index'])->name('imports');

Route::post('/importsProducts', [ProductsImportController::class,'import'])->name('import.products');

Route::post('/tryRemittance', [TryRemittanceController::class,'store'])->name('tryRemittance');

Route::get('/disable', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('disable');

    require __DIR__.'/auth.php';

Route::group(['middleware' => ['auth']], function() {
     Route::resource('roles', RolController::class);
     Route::resource('users', UserController::class);
     Route::resource('products', ProductController::class);
     Route::resource('news', NewsController::class);

Route::group(['middleware' => ['auth']], function (){
     Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
            Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
            Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
            Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
            Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    });
Route::resource('external-api',RemittanceController::class);
});


