<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ServiceFacilityController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\ServiceFacility;
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

Route::get('/', [PageController::class,'landing'])->name('landing');
Route::get('/about', [PageController::class,'about'])->name('about');
Route::get('/contact', [PageController::class,'contact'])->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('room-info')->name('room-info.')->group(function (){
        Route::resource('room-type', RoomTypeController::class);
        Route::resource('room', RoomController::class);
        Route::resource('service-facility', ServiceFacilityController::class);
    });

    Route::prefix('setting')->name('setting.')->group(function (){
        Route::view('/', 'setting.index')->name('index');
        Route::resource('/user', RegisteredUserController::class);
        Route::resource('/guest', GuestController::class);
    });
});

require __DIR__.'/auth.php';
