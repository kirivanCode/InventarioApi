<?php

use Illuminate\Http\Request;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
// routes/api.php
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Rutas para Proveedor
Route::get('/proveedores', [ProveedorController::class, 'index']);
Route::post('/proveedores', [ProveedorController::class, 'store']);
Route::get('/proveedores/{id}', [ProveedorController::class, 'show']);
Route::put('/proveedores/{id}', [ProveedorController::class, 'update']);
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy']);

// Rutas para Producto
Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);
// Rutas para Clientes
Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);




// Rutas para Compras
Route::get('/compras', [CompraController::class, 'index']);
Route::post('/compras', [CompraController::class, 'store']);
Route::get('/compras/{id}', [CompraController::class, 'show']);
Route::put('/compras/{id}', [CompraController::class, 'update']);
Route::delete('/compras/{id}', [CompraController::class, 'destroy']);

// Rutas para Ventas
Route::get('/ventas', [VentaController::class, 'index']);
Route::post('/ventas', [VentaController::class, 'store']);
Route::get('/ventas/{id}', [VentaController::class, 'show']);
Route::put('/ventas/{id}', [VentaController::class, 'update']);
Route::delete('/ventas/{id}', [VentaController::class, 'destroy']);