<?php

use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\IndexBookingController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/services', [IndexController::class, 'services'])->name('services.index');
// Booking
Route::get('/booking', [IndexBookingController::class, 'index'])->name('booking.index');
Route::post('/booking/store', [IndexBookingController::class, 'store'])->name('booking.store');
// Gallery
Route::get('/gallery', [IndexController::class, 'index'])->name('gallery.index');
// Admin Dashboard
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::get('/', HomeController::class)->name('home');

    Route::resource('/roles', RolesController::class);
    Route::resource('/permissions', PermissionsController::class);
    Route::resource('/settings', SettingController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/bookings', BookingController::class);
    ROute::resource('/pages', PageController::class)->except(['show', 'destroy']);
    Route::post('pages/media', [PageController::class, 'storeMedia'])->name('pages.storeMedia');
    Route::post('pages/ckmedia', [PageController::class, 'storeCKEditorImages'])->name('pages.storeCKEditorImages');
    Route::post('galleries/media', [GalleryController::class, 'storeMedia'])->name('galleries.storeMedia');
    Route::resource('/galleries', GalleryController::class);
    Route::post('services/media', [ServiceController::class, 'storeMedia'])->name('services.storeMedia');
    Route::resource('/services', ServiceController::class);

});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', [ChangePasswordController::class, 'edit'])->name('password.edit');
        Route::post('password', [ChangePasswordController::class, 'update'])->name('password.update');
        Route::post('profile', [ChangePasswordController::class, 'updateProfile'])->name('password.updateProfile');
        Route::post('profile/destroy', [ChangePasswordController::class, 'destroy'])->name('password.destroyProfile');
    }
});

require __DIR__.'/auth.php';
