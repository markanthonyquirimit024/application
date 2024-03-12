<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingApiController;
use App\Http\Controllers\CustomerApiController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServicesApiController;
use App\Http\Controllers\ServiceCategoryApiController;
use App\Http\Controllers\ServiceByCategoryApiController;
use App\Http\Controllers\ServiceController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/forgot-password', [AuthController::class, 'forgot']);
Route::post('/reset-password', [AuthController::class, 'reset']);

Route::get('/service-categories', [ServiceCategoryApiController::class, 'index']);
Route::get('/services/{category_slug}', [ServiceByCategoryApiController::class, 'index']);
Route::get('/service/{service_slug}', [ServiceController::class, 'index']);

Route::middleware(['auth:sanctum','verified', 'authcustomer'])->group(function () {
    Route::get('/customer/profile', [CustomerApiController::class, 'index']);
    Route::get('customer/booking-history', [BookingApiController::class, 'index']);
    Route::post('/service/{service_slug}', [BookingApiController::class, 'store']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:sanctum','verified','authsprovider'])->group(function () {
    Route::post('/logout', [AuthController::class, 'sproviderLogout']);
});

Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'adminLogout']);
    Route::get('admin/users', [AuthController::class, 'index']);
});
// Route::post('/reset-password', [AuthController::class, 'reset']);


