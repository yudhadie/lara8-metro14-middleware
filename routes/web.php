<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {

    Route::middleware('admin')->prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/setting/user', UserController::class);
        Route::put('/setting/user-reset/{user}', [UserController::class, 'updatepassword'])->name('user.reset');

        //Table
        Route::get('/setting/data/user', [DataController::class, 'datauser'])->name('data.user');
        });

    Route::middleware([
    ])->group(function () {
        Route::get('/welcome', function () {
            return view('welcome');
        })->name('welcome');
    });

});
