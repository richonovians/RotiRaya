<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController; 
use App\Http\Controllers\Api\AuthController; 
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use Laravel\Sanctum\Sanctum;


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    // Route::apiResource('users', UserController::class);
    Route::resource('produk', ProductController::class);
    Route::delete('produk/{id}', [ProductController::class, 'destroy']); // Soft Delete
    Route::get('produk/trashed', [ProductController::class, 'trashed']);  // Melihat Produk yang Soft Deleted
    Route::post('produk/restore/{id}', [ProductController::class, 'restore']); // Mengembalikan Produk yang Soft Deleted
    Route::delete('produk/forceDelete/{id}', [ProductController::class, 'forceDelete']); // Force Delete Produk
    Route::post('logout', [AuthController::class, 'logout']);

});

Route::apiResource('users', UserController::class)->middleware('auth:sanctum');
// Route::resource('produk', ProductController::class);




// // Endpoint untuk login dan mendapatkan token
// Route::post('login', function (Request $request) {
//     // Validasi input email dan password
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required|string',
//     ]);

//     // Cek apakah kredensial valid
//     if (Auth::attempt($request->only('email', 'password'))) {
//         // Jika berhasil, buat token untuk pengguna
//         $user = $request->user();
//         return response()->json([
//             'token' => $user->createToken('MyApp')->plainTextToken
//         ]);
//     }

//     // Jika gagal, kirimkan respons Unauthorized
//     return response()->json(['message' => 'Unauthorized'], 401);
// });

// // Endpoint untuk mendapatkan data pengguna yang terautentikasi
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// // Menggunakan apiResource untuk produk
// Route::middleware('auth:sanctum')->apiResource('products', ProductController::class);
