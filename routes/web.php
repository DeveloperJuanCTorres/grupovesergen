<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/register', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/product/{product}', [App\Http\Controllers\HomeController::class, 'detail'])->name('product.detail');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{blog}', [App\Http\Controllers\HomeController::class, 'blogDetail'])->name('blog.detail');
Route::get('/facturacion', [App\Http\Controllers\HomeController::class, 'facturacion'])->name('facturacion');
Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
Route::get('/buscar', [App\Http\Controllers\HomeController::class, 'buscar'])->name('buscar');
Route::get('/libro-reclamaciones', [App\Http\Controllers\HomeController::class, 'reclamaciones'])->name('libro-reclamaciones');

Route::get('/apibrand', [App\Http\Controllers\HomeController::class, 'apiBrand'])->name('apibrand');
Route::get('/apicategory', [App\Http\Controllers\HomeController::class, 'apiCategory'])->name('apicategory');
Route::get('/apiproduct', [App\Http\Controllers\HomeController::class, 'apiProduct'])->name('apiproduct');

Route::post('add', [App\Http\Controllers\CartController::class, 'add'])->name('add');
Route::get('cart', [App\Http\Controllers\CartController::class, 'cart'])->name('cart');
Route::get('cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('clear');
Route::post('cart/removeitem', [App\Http\Controllers\CartController::class, 'removeItem'])->name('removeitem');

Route::post('/enviar_pedido', [App\Http\Controllers\HomeController::class, 'pedido'])->name('enviar_pedido');
Route::post('/correo',[App\Http\Controllers\HomeController::class,'correoContact']);
Route::post('/reclamo',[App\Http\Controllers\HomeController::class,'correoReclamo']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Desactiva el registro web manual
Route::get('/register', function () {
    abort(404);
});
Route::post('/register', function () {
    abort(404);
});
