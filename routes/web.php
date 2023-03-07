<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;

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

Route::get('/about', function () {
    return view('frontend.main_about');
})->name('main.about');

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
    Route::get('/home/setup', 'homeSlider')->name('home.slider');
    Route::post('/home/update', 'updateHomeSlide')->name('admin_home_slider');
});


//About All routes
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/setup', 'AboutSetup')->name('about.setup');
    Route::post('/about/update', 'updateAbout')->name('about.update');
    Route::get('/about/multi_upload', 'uploadMultiImage')->name('about.multi_image');
    Route::post('/about/storeMultiImage', 'storeMultipleImages')->name('upload.multipleImages');
    Route::get('/about/view_images', 'viewUploadedImages')->name('about.view_images');
    Route::get('/about/edit_images/{id}', 'editMultiImage')->name('edit.multi_image');
    Route::post('/about/update_image', 'updateImage')->name('update.edit_image');
    Route::get('/about/delete_image/{id}', 'deleteImage')->name('delete.multi.image');
});


// Portfolio All routes
Route::controller(PortfolioController::class)->group(function () {
    Route::get('/portfolio/all', 'viewUploadedPortfolio')->name('all.portfolio');
    Route::get('/portfolio/setup', 'PortfolioSetup')->name('add.portfolio');
    Route::post('/portfolio/store', 'StorePortfolio')->name('store.portfolio');
    Route::get('/portfolio/edit/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('/portfolio/update', 'UpdatePorfolio')->name('update.portfolio');
    Route::get('/portfolio/delete/{id}', 'DeletePortfolio')->name('delete.portfolio');
});
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
