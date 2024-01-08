<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CederaController;
use App\Http\Controllers\Api\JadwalController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\PembayaranController;
use App\Http\Controllers\Api\PendaftaranController;

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
    // Show Profile
    Route::get('/', 'profile');
    // Edit Profile
    Route::put('/edit', 'editProfile');
});

// ---CUSTOMER--- //
Route::prefix('customer')->controller(CustomerController::class)->group(function () {
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
Route::prefix('cedera')->controller(CederaController::class)->group(function () {
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

// ---PENDAFTARAN--- //
Route::prefix('pendaftaran')->controller(PendaftaranController::class)->group(function () {
    // All Pendaftarans
    Route::get('/', 'index');
    // Pendaftaran berdasarkan User
    Route::get('/ticket', 'userRegist')->middleware('auth:sanctum');
    // Show 1 Pendaftaran
    Route::get('/{pendaftaran:slug}', 'show');
    // Create Pendaftaran
    Route::post('/create', 'store')->middleware('auth:sanctum');
    // Edit Pendaftaran
    Route::put('/edit/{pendaftaran:slug}', 'update')->middleware('auth:sanctum');
    // Add Jadwal Pendaftaran
    Route::put('/addjadwal/{pendaftaran:slug}', 'addJadwal')->middleware('auth:sanctum');
    // Edit Jadwal Pendaftaran
    Route::put('/editjadwal/{pendaftaran:slug}', 'editJadwal')->middleware('auth:sanctum');
    // Verifikasi Pendaftaran
    Route::put('/verification/{pendaftaran:slug}', 'verification'); //->middleware('auth:sanctum');
    // Delete Pendaftaran
    Route::delete('/delete/{pendaftaran:slug}', 'destroy')->middleware('auth:sanctum');
});

// ---PEMBAYARAN--- //
Route::prefix('pembayaran')->controller(PembayaranController::class)->group(function () {
    // Checkout
    Route::post('/checkout/{pendaftaran:slug}', 'checkout');
    // Callback
    Route::put('/callback/{pembayaran}/{pendaftaran:slug}', 'callback');
    // Invoice
    Route::get('/invoice/{id}', 'invoice');
});
