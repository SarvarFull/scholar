<?php

use App\Http\Controllers\Backend\AboutUsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactUsController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\IndicatorController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TeacherController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Frontend\IndexController as FrontendIndexController;
use App\Http\Controllers\Backend\IndexController as BackendIndexController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\SiteSettingCOntroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendIndexController::class, 'mainPage'])->name('main.page');

//Routes For Admin Panel Start//

Route::prefix('ceo')->group(function () {

    Route::get('/admin_sign_in', [BackendIndexController::class, 'adminRegister'])->name('admin.register.page');
    Route::post('/admin_sign_in', [BackendIndexController::class, 'adminSignIn'])->name('admin.sign.in');
    Route::get('/admin/dashboard', [BackendIndexController::class, 'adminDashboard'])->name('admin.dashboard');


    Route::prefix('slider')->group(function () {
        Route::get('/view', [SliderController::class, 'sliderView'])->name('slider.view');
        Route::get('/store', [SliderController::class, 'sliderStore'])->name('slider.store');
        Route::post('/store', [SliderController::class, 'sliderAdd'])->name('slider.add');
        Route::get('/edit/{id}', [SliderController::class, 'sliderEdit'])->name('slider.edit');
        Route::post('/edit/{id}', [SliderController::class, 'sliderUpdate'])->name('slider.update');
        Route::get('/delete/{id}', [SliderController::class, 'sliderDelete'])->name('slider.delete');
    });

    Route::prefix('services')->group(function () {
        Route::get('/view', [ServiceController::class, 'servicesView'])->name('services.view');
        Route::get('/store', [ServiceController::class, 'servicesStore'])->name('services.store');
        Route::post('/store', [ServiceController::class, 'servicesAdd'])->name('services.add');
        Route::get('/edit/{id}', [ServiceController::class, 'servicesEdit'])->name('services.edit');
        Route::post('/edit/{id}', [ServiceController::class, 'servicesUpdate'])->name('services.update');
        Route::get('/delete/{id}', [ServiceController::class, 'servicesDelete'])->name('services.delete');
    });

    Route::prefix('courses')->group(function () {
        Route::get('/view', [CourseController::class, 'coursesView'])->name('courses.view');
        Route::get('/store', [CourseController::class, 'coursesStore'])->name('courses.store');
        Route::post('/store', [CourseController::class, 'coursesAdd'])->name('courses.add');
        Route::get('/edit/{id}', [CourseController::class, 'coursesEdit'])->name('courses.edit');
        Route::post('/edit/{id}', [CourseController::class, 'coursesUpdate'])->name('courses.update');
        Route::get('/delete/{id}', [CourseController::class, 'coursesDelete'])->name('courses.delete');
    });

    Route::prefix('teachers')->group(function () {
        Route::get('/view', [TeacherController::class, 'teachersView'])->name('teachers.view');
        Route::get('/store', [TeacherController::class, 'teachersStore'])->name('teachers.store');
        Route::post('/store', [TeacherController::class, 'teachersAdd'])->name('teachers.add');
        Route::get('/edit/{id}', [TeacherController::class, 'teachersEdit'])->name('teachers.edit');
        Route::post('/edit/{id}', [TeacherController::class, 'teachersUpdate'])->name('teachers.update');
        Route::get('/delete/{id}', [TeacherController::class, 'teachersDelete'])->name('teachers.delete');
    });

    Route::prefix('events')->group(function () {
        Route::get('/view', [EventController::class, 'eventsView'])->name('events.view');
        Route::get('/store', [EventController::class, 'eventsStore'])->name('events.store');
        Route::post('/store', [EventController::class, 'eventsAdd'])->name('events.add');
        Route::get('/edit/{id}', [EventController::class, 'eventsEdit'])->name('events.edit');
        Route::post('/edit/{id}', [EventController::class, 'eventsUpdate'])->name('events.update');
        Route::get('/delete/{id}', [EventController::class, 'eventsDelete'])->name('events.delete');
    });

    Route::prefix('categories')->group(function () {
        Route::get('/view', [CategoryController::class, 'categoriesView'])->name('categories.view');
        Route::get('/store', [CategoryController::class, 'categoriesStore'])->name('categories.store');
        Route::post('/store', [CategoryController::class, 'categoriesAdd'])->name('categories.add');
        Route::get('/edit/{id}', [CategoryController::class, 'categoriesEdit'])->name('categories.edit');
        Route::post('/edit/{id}', [CategoryController::class, 'categoriesUpdate'])->name('categories.update');
        Route::get('/delete/{id}', [CategoryController::class, 'categoriesDelete'])->name('categories.delete');
    });

    Route::prefix('indicators')->group(function () {
        Route::get('/view', [IndicatorController::class, 'indicatorsView'])->name('indicators.view');
        Route::get('/store', [IndicatorController::class, 'indicatorsStore'])->name('indicators.store');
        Route::post('/store', [IndicatorController::class, 'indicatorsAdd'])->name('indicators.add');
        Route::get('/edit/{id}', [IndicatorController::class, 'indicatorsEdit'])->name('indicators.edit');
        Route::post('/edit/{id}', [IndicatorController::class, 'indicatorsUpdate'])->name('indicators.update');
        Route::get('/delete/{id}', [IndicatorController::class, 'indicatorsDelete'])->name('indicators.delete');
    });

    Route::prefix('about_us')->group(function () {
        Route::get('/view', [AboutUsController::class, 'about_usView'])->name('about_us.view');
        Route::get('/store', [AboutUsController::class, 'about_usStore'])->name('about_us.store');
        Route::post('/store', [AboutUsController::class, 'about_usAdd'])->name('about_us.add');
        Route::get('/edit/{id}', [AboutUsController::class, 'about_usEdit'])->name('about_us.edit');
        Route::post('/edit/{id}', [AboutUsController::class, 'about_usUpdate'])->name('about_us.update');
        Route::get('/delete/{id}', [AboutUsController::class, 'about_usDelete'])->name('about_us.delete');
    });

    Route::prefix('contact_us')->group(function () {
        Route::get('/view', [ContactUsController::class, 'contact_KusView'])->name('contact_us.view');
        Route::get('/store', [ContactUsController::class, 'contact_usStore'])->name('contact_us.store');
        Route::post('/store', [ContactUsController::class, 'contact_usAdd'])->name('contact_us.add');
        Route::get('/edit/{id}', [ContactUsController::class, 'contact_usEdit'])->name('contact_us.edit');
        Route::post('/edit/{id}', [ContactUsController::class, 'contact_usUpdate'])->name('contact_us.update');
        Route::get('/delete/{id}', [ContactUsController::class, 'contact_usDelete'])->name('contact_us.delete');
    });


    Route::prefix('users')->group(function () {
        Route::get('/view', [UsersController::class, 'usersView'])->name('users.view');
    });
});

Route::post('/register', [UsersController::class, 'usersRegister'])->name('users.register');

//Routes For Admin Panel End//
