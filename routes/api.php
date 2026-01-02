<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Api\Auth\AuthController;

// Product routes
Route::get('products', [ProductController::class, 'index'])->middleware('auth:sanctum')->can('products-view');
Route::get('products/{id}', [ProductController::class, 'show'])->middleware('auth:sanctum')->can('products-view');
Route::post('products', [ProductController::class, 'store'])->middleware('auth:sanctum')->can('products-create');
Route::put('products/{id}', [ProductController::class, 'update'])->middleware('auth:sanctum')->can('products-update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->middleware('auth:sanctum')->can('products-delete');

// Auth routes
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('auth/me', [AuthController::class, 'me'])->middleware('auth:sanctum');