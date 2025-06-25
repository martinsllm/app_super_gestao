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
    Route::get('clients', function () {
        return 'Clients';
    })->name('app.clients');

    Route::get('suppliers', [\App\Http\Controllers\SupplierController::class, 'index'])->name('app.suppliers');
    ;

    Route::get('products', function () {
        return 'Products';
    })->name('app.products');
    ;
});

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.main') . '">Clique aqui </a> para retornar à página inicial.';
});


