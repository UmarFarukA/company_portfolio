<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   middleware(['auth', 'verified'])->
*/

Route::get('/', function () {
    return view('frontend.fr_index');
});

Route::get('/login', function () {
    return view('login')->name('login');
});

Route::get('/register', function () {
    return view('register')->name('register');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard')->middleware('auth');

// Admin Routes
Route::controller(AdminController::class)->group(function () {
    Route::get('/Admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'profile')->name('admin.profile');
    Route::get('/edit/profile', 'editProfile')->name('admin_edit.profile');
    Route::post('/store/profile', 'storeProfile')->name('admin_store.profile');
    Route::get('/admin/change_password', 'changePassword')->name('admin.change_password');
    Route::post('/admin/store_password', 'updatePassword')->name('admin.store_password');
});

// Home Slide Routes
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/admin/home', 'homeSlider')->name('home.slider');
    Route::post('/admin/homeslider_update', 'updateHomeSlide')->name('admin_home_slider');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
