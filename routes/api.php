<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CederaController;
use App\Http\Controllers\Api\PendaftaranController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\JadwalController;

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




// ---AUTHENTICATION--- //
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    // Register
    Route::post('/register', 'register');
    // Login
    Route::post('/login', 'login');
    // Logout
    Route::get('/logout', 'logout')->middleware('auth:sanctum');
    // Change Password
    // Route::post('/forgot-password', 'forgotPassword');
    // Route::post('/reset-password', 'reset');
});

// ---PROFILE--- //
Route::prefix('profile')->controller(CustomerController::class)->middleware('auth:sanctum')->group(function () {
    // Profile Customer
    Route::get('/', 'profile');
    // Profile
    Route::put('/edit', 'editProfile');
});

// ---CUSTOMER--- //
Route::prefix('customers')->controller(CustomerController::class)->group(function () {
    // All Customers
    Route::get('/', 'index');
    // Create Customer
    Route::post('/create', 'store')->middleware('auth:sanctum');
    // Edit Customer
    Route::put('/edit/{user}', 'update')->middleware('auth:sanctum');
    // Delete Customer
    Route::delete('/delete/{user}', 'destroy')->middleware('auth:sanctum');
});

// ---CEDERA--- //
Route::prefix('cederas')->controller(CederaController::class)->group(function () {
    // All Cederas
    Route::get('/', 'index');
    // Show 1 Cedera
    Route::get('/{id}', 'show');
    // Create Cedera
    Route::post('/create', 'store')->middleware('auth:sanctum');
    // Edit Cedera
    Route::put('/edit/{cedera}', 'update')->middleware('auth:sanctum');
    // Delete Cedera
    Route::delete('/delete/{cedera}', 'destroy')->middleware('auth:sanctum');
});

// ---PENDAFTARAN--- //
Route::prefix('daftar')->controller(PendaftaranController::class)->group(function () {
    // All Pendaftarans
    Route::get('/', 'index');
    // Pendaftaran berdasarkan User
    Route::get('/ticket', 'userRegist')->middleware('auth:sanctum');
    // Show 1 Pendaftaran
    Route::get('/{id}', 'show');
    // Create Pendaftaran
    Route::post('/create', 'store')->middleware('auth:sanctum');
    // Edit Pendaftaran
    Route::put('/edit/{pendaftaran}', 'update')->middleware('auth:sanctum');
    // Verifikasi Pendaftaran
    Route::put('/verification/{pendaftaran}', 'verification')->middleware('auth:sanctum');
    // Delete Pendaftaran
    Route::delete('/delete/{pendaftaran}', 'destroy')->middleware('auth:sanctum');
});

// ---JADWAL--- //
Route::prefix('jadwal')->controller(JadwalController::class)->group(function () {
    // All Jadwals
    Route::get('/', 'index');
    // Show 1 Jadwal
    Route::get('/{id}', 'show');
    // Create Jadwal
    Route::post('/create', 'store')->middleware('auth:sanctum');
    // Edit Jadwal
    Route::put('/edit/{jadwal}', 'update')->middleware('auth:sanctum');
    // Delete Jadwal
    Route::delete('/delete/{jadwal}', 'destroy')->middleware('auth:sanctum');
});
