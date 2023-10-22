<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ServiceFacilityController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\AjaxController;
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
Route::post('/guest-info-add', [PageController::class,'guestInfoAdd'])->name('guest-info-add');
Route::get('/guest-booking', [PageController::class,'guestBooking'])->name('guest-booking');
Route::post('/guest-booking-add', [PageController::class,'guestBookingAdd'])->name('guest-booking-add');
Route::get('/change-guest', [PageController::class,'changeGuest'])->name('change-guest');
Route::get('/room-list', [PageController::class,'roomList'])->name('room-list');

Route::prefix('/ajax')->name('ajax.')->controller(AjaxController::class)->group(function () {
    Route::get('/search-rooms', 'searchRooms')->name('search-rooms');
    Route::get('/update-status', 'updateStatus')->name('update-status');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('/admin')->group(function () {
    Route::get('booking/canceled-list', [BookingController::class, 'canceledList'])->name('booking.canceled-list');
    Route::resource('booking', BookingController::class);

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

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::view('/', 'dashboard.index')->name('index');
        Route::redirect('/', '/admin/dashboard/chart');
        Route::get('/chart', [ChartController::class,'index'])->name('dashboard.index');
    });
});

require __DIR__ . '/auth.php';
