<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::Class, 'index']);
Route::get('/encomendas', [ProductController::class, 'showOrder']);
Route::get('/carrinho', [ProductController::class, 'showCart']);
Route::get('/perfil', [UserController::class, 'showProfile']);
Route::get('/admin', [UserController::class, 'showAdminHome']);
Route::get('/admin-encomendas', [ProductController::class, 'showOrderAdmin']);
Route::get('/admin-vendas', [ProductController::class, 'showSaleAdmin']);
Route::get('/admin-produtos', [ProductController::class, 'showProductAdmin']);
Route::get('/admin-estoque', [ProductController::class, 'showStockAdmin']);
Route::get('/admin-clientes', [ProductController::class, 'showClientAdmin']);
Route::post('/registrar-cliente', [UserController::class, 'storeClient']);
Route::post('/entrar', [UserController::class, 'login']);
Route::post('/sair', [UserController::class, 'logout']);
