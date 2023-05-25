<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/login', function () {
    return view('authcustom.login');
})->name('loginview');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');

Route::get('/register', function () {
    return view('authcustom.register');
})->name('registerview');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register');
/**hanya untuk development nanti akan dihapus
Route::get('/get-session', [App\Http\Controllers\AuthController::class, 'getallsession'])->name('get-session');
**/
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'Logout'])->name('logout');

Route::middleware('AuthAccess')->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
