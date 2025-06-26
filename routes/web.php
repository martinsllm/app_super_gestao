<?php

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'index'])->name('site.main')->middleware('log.acesso');

Route::get('/about-us', [\App\Http\Controllers\AboutUsController::class, 'index'])->name('site.about-us');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('site.contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('site.contact');

Route::get('login/{error?}', [\App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('login', [\App\Http\Controllers\LoginController::class, 'login'])->name('site.login');

Route::prefix('/app')->middleware('authenticator:default,visitor')->group(function () {
    Route::get('home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('app.logout');
    Route::get('client', [\App\Http\Controllers\ClientController::class, 'index'])->name('app.client');

    Route::get('supplier', [\App\Http\Controllers\SupplierController::class, 'index'])->name('app.supplier');
    Route::post('supplier/list', [\App\Http\Controllers\SupplierController::class, 'list'])->name('app.supplier.list');
    Route::get('supplier/add', [\App\Http\Controllers\SupplierController::class, 'add'])->name('app.supplier.add');
    Route::post('supplier/add', [\App\Http\Controllers\SupplierController::class, 'add'])->name('app.supplier.add');
    Route::get('supplier/update/{id}/{msg?}', [\App\Http\Controllers\SupplierController::class, 'update'])->name('app.supplier.update');

    Route::get('product', [\App\Http\Controllers\ProductController::class, 'index'])->name('app.product');
});

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.main') . '">Clique aqui </a> para retornar à página inicial.';
});


