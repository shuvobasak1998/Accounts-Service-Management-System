<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\BlogDetailController;
use App\Http\Controllers\Backend\OurProgressController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BusinessInfoController;
use App\Http\Controllers\Backend\ImageGalleryController;
use App\Http\Controllers\Backend\CustomerReviewController;
use App\Http\Controllers\Backend\ServiceCategoryController;
use App\Http\Controllers\Backend\TeamInformationController;
use App\Http\Controllers\Backend\PartnersInformationController;
use App\Http\Controllers\Backend\ServicesInformationController;
use App\Http\Controllers\Backend\ContactUsInformationController;




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //=====================USER ROUTE START========================\\
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/create', [UserController::class, 'create'])->name('create'); // Show form
        Route::post('/store', [UserController::class, 'store'])->name('store'); // Save new user
        Route::get('/list', [UserController::class, 'index'])->name('list'); // List users
        Route::get('/view/{id}', [UserController::class, 'show'])->name('view'); // View user (Route Model Binding)
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit'); // Edit form
        Route::put('/update/{id}', [UserController::class, 'editStore'])->name('update'); // Update user (Use PUT)
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete'); // Delete user (Use DELETE)
    });
    //=====================USER ROUTE END============================\\

    //========================Business Information route Start===========================\\
    Route::resource('businessinfo', BusinessInfoController::class);
    Route::get('/businessinfo/delete/{id}', [BusinessInfoController::class, 'delete'])->name('businessinfo.delete');
    //===========================Business Information route End===========================\\

    //========================services Information route Start===========================\\
    Route::resource('servicesinfo', ServicesInformationController::class);
    Route::get('/servicesinfo/delete/{id}', [ServicesInformationController::class, 'delete'])->name('servicesinfo.delete');
    //===========================services Information route End===========================\\

    //========================partners Information route Start===========================\\
    Route::resource('partnersinfo', PartnersInformationController::class);
    Route::get('/partnersinfo/delete/{id}', [PartnersInformationController::class, 'delete'])->name('partnersinfo.delete');
    //===========================partners Information route End===========================\\

    //========================customer_review Information route Start===========================\\
    Route::resource('customer_review', CustomerReviewController::class);
    Route::get('/customer_review/delete/{id}', [CustomerReviewController::class, 'delete'])->name('customer_review.delete');
    //===========================customer_review Information route End===========================\\

    //========================Business Information route Start===========================\\
    Route::resource('our_team', TeamInformationController::class);
    Route::get('/our_team/delete/{id}', [TeamInformationController::class, 'delete'])->name('our_team.delete');
    //===========================Business Information route End===========================\\

    //========================Our Progress Information route Start===========================\\
    Route::resource('our_progress', OurProgressController::class);
    Route::get('/our_progress/delete/{id}', [OurProgressController::class, 'delete'])->name('our_progress.delete');
    //===========================Our Progress Information route End===========================\\

    //========================About us Information route Start===========================\\
    Route::resource('about_us', AboutUsController::class);
    Route::get('/about_us/delete/{id}', [AboutUsController::class, 'delete'])->name('about_us.delete');
    //===========================About us Information route End===========================\\

    //========================About us Information route Start===========================\\
    Route::resource('contact_us', ContactUsInformationController::class);
    Route::get('/contact_us/delete/{id}', [ContactUsInformationController::class, 'delete'])->name('contact_us.delete');
    //===========================About us Information route End===========================\\

    //========================BlogCategory Information route Start===========================\\
    Route::resource('blog_category', BlogCategoryController::class);
    Route::get('/blog_category/delete/{id}', [BlogCategoryController::class, 'delete'])->name('blog_category.delete');
    //===========================BlogCategory Information route End===========================\\

    //========================Service Category Information route Start===========================\\
    Route::resource('service_category', ServiceCategoryController::class);
    Route::get('/service_category/delete/{id}', [ServiceCategoryController::class, 'delete'])->name('service_category.delete');
    //===========================Service Category Information route End===========================\\

    //========================Service Category Information route Start===========================\\
    Route::resource('tag', TagController::class);
    Route::get('/tag/delete/{id}', [TagController::class, 'delete'])->name('tag.delete');
    //===========================Service Category Information route End===========================\\

    //========================Service Category Information route Start===========================\\
    Route::resource('blog_details', BlogDetailController::class);
    Route::get('/blog_details/delete/{id}', [BlogDetailController::class, 'delete'])->name('blog_details.delete');
    //===========================Service Category Information route End===========================\\

    //========================Service Category Information route Start===========================\\
    Route::resource('image_gallery', ImageGalleryController::class);
    Route::get('/image_gallery/delete/{id}', [ImageGalleryController::class, 'delete'])->name('image_gallery.delete');
    //===========================Service Category Information route End===========================\\


});
