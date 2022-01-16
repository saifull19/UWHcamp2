<?php

use Illuminate\Support\Facades\Route;

// front (landing)
use App\Http\Controllers\Landing\LandingController;

// member (dashboard)
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\MyOrderController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\UserController;

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
// midtrans routes
Route::get('payment/success', [LandingController::class, 'midtransCallback']);
Route::post('payment/success', [LandingController::class, 'midtransCallback']);

Route::get('corporate', [LandingController::class, 'corporate'])->name('corporate.landing');
Route::get('profesional', [LandingController::class, 'profesional'])->name('profesional.landing');
Route::get('detail_booking/{id}', [LandingController::class, 'detail_booking'])->name('detail.booking.landing');
Route::get('booking/{id}', [LandingController::class, 'booking'])->name('booking.landing');
Route::get('detail/{slug:slug}', [LandingController::class, 'detail'])->name('detail.landing');
Route::get('explore', [LandingController::class, 'explore'])->name('explore.landing');
Route::resource('/', LandingController::class);

// route group yang menggunakan middleware
Route::group(['prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth:sanctum', 'verified']], function() {

    // dashboard
    Route::resource('dashboard', MemberController::class);

    // service
    Route::resource('service', ServiceController::class)->middleware('admin');

    // request
    Route::get('approve_request/{id}', [RequestController::class, 'approve'])->name('approve.request');
    Route::resource('request', RequestController::class);

    // My order
    Route::get('accept/order/{id}', [MyOrderController::class, 'accepted'])->name('accept.order')->middleware('admin');
    Route::get('reject/order/{id}', [MyOrderController::class, 'rejected'])->name('reject.order')->middleware('admin');
    Route::resource('order', MyOrderController::class)->middleware('admin');

    // profile
    Route::get('delete_photo', [ProfileController::class, 'delete'])->name('delete.photo.profile');
    Route::get('editt', [ProfileController::class, 'editt'])->name('profile.editt');
    Route::resource('profile', ProfileController::class);
});


// route socialite
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');
Route::get('auth/google', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
