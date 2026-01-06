<?php

use App\Http\Controllers\Frontend\FrontendAboutController;
use App\Http\Controllers\Frontend\FrontendContactController;
use App\Http\Controllers\Frontend\FrontendBlogController;
use App\Http\Controllers\Frontend\FrontendLandingController;
use App\Http\Controllers\Frontend\FrontendServiceController;
use Illuminate\Support\Facades\Route;


// frontend Route
Route::get('/', [FrontendLandingController::class, 'landingPage'])->name('landingPage');

Route::get('/about', [FrontendAboutController::class, 'aboutPage'])->name('aboutPage');
Route::get('/contact', [FrontendContactController::class, 'contactPage'])->name('contactPage');
Route::get('/contact', [FrontendContactController::class, 'contactPage'])->name('contactPage');
Route::get('/service-details/{slug}', [FrontendServiceController::class, 'serviceDetails'])->name('serviceDetails');
Route::get('/single-blog/{slug}',[FrontendBlogController::class,'singleBlog'])->name('singleBlog');

// Backend Route
Route::group([], function () {
    Route::middleware([ 'auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
        Route::get('/dashboard', function () {
            return view('backend.dashboard');
        })->name('dashboard');
    });
    //custom route
    require __DIR__ . '/shuvo.php';
});
