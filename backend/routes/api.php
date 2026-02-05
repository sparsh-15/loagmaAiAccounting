<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OCRController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Auth
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('refresh', [AuthController::class, 'refresh'])->middleware('auth:sanctum');
Route::get('me', [AuthController::class, 'me'])->middleware('auth:sanctum');

// Invoices
Route::apiResource('invoices', InvoiceController::class)->middleware('auth:sanctum');

// OCR
Route::post('ocr/process', [OCRController::class, 'process'])->middleware('auth:sanctum');
Route::get('ocr/status/{jobId}', [OCRController::class, 'status'])->middleware('auth:sanctum');
Route::get('ocr/raw/{invoiceId}', [OCRController::class, 'raw'])->middleware('auth:sanctum');

// Review
Route::get('review/queue', [ReviewController::class, 'queue'])->middleware('auth:sanctum');
Route::get('review/{invoice}', [ReviewController::class, 'show'])->middleware('auth:sanctum');
Route::post('review/{invoice}/approve', [ReviewController::class, 'approve'])->middleware('auth:sanctum');
Route::post('review/{invoice}/reject', [ReviewController::class, 'reject'])->middleware('auth:sanctum');
Route::put('review/{invoice}/edits', [ReviewController::class, 'saveEdits'])->middleware('auth:sanctum');

// Analytics
Route::get('analytics/dashboard', [AnalyticsController::class, 'dashboard'])->middleware('auth:sanctum');
Route::get('analytics/vendors', [AnalyticsController::class, 'vendors'])->middleware('auth:sanctum');
Route::get('analytics/industries', [AnalyticsController::class, 'industries'])->middleware('auth:sanctum');
Route::get('analytics/accuracy', [AnalyticsController::class, 'accuracy'])->middleware('auth:sanctum');
