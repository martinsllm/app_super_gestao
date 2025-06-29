<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use \App\Http\Controllers\SupplierController;

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

//Rotas Privadas
Route::prefix('/app')->middleware('authenticator:default,visitor')->group(function () {
    Route::get('home', [\App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('app.logout');
    Route::get('client', [\App\Http\Controllers\ClientController::class, 'index'])->name('app.client');

    //Fornecedores
    Route::resource('supplier', SupplierController::class);
    Route::post('supplier/list', [SupplierController::class, 'show'])->name('supplier.list');
    Route::get('supplier/list', [SupplierController::class, 'show'])->name('supplier.list');

    //Produtos
    Route::resource('product', ProductController::class);
    Route::resource('product_detail', ProductDetailController::class);
});

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.main') . '">Clique aqui </a> para retornar à página inicial.';
});


