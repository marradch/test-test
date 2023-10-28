<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestController;

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

Route::get('/', function () {
    if (!auth()->user()) {
        return view('auth.login');
    } else {
        return view('home');
    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('tests/set-score/{test}', [TestController::class, 'setScore'])->name('tests.setScore');
    Route::post('tests/store-score/{test}', [TestController::class, 'storeScore'])->name('tests.storeScore');

    Route::middleware('is-admin')->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('tests', TestController::class)->only(['create', 'update', 'store', 'edit', 'destroy']);
    });
    Route::resource('tests', TestController::class)->only(['index', 'show']);
});
