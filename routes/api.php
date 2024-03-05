<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum','verified', 'authcustomer'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::middleware(['auth:sanctum','verified','authsprovider'])->group(function () {
    Route::post('/logout', [AuthController::class, 'sproviderLogout']);
});
Route::middleware(['auth:sanctum','verified','authadmin'])->group(function () {
    Route::post('/logout', [AuthController::class, 'adminLogout']);
});

