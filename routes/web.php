<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Signup;
use App\Livewire\Car\AllCars;
use App\Livewire\Car\CarIndex;
use App\Livewire\Car\CreateCar;
use App\Livewire\Car\EditCar;
use App\Livewire\CarCategory\AllCarCategories;
use App\Livewire\CarCategory\CreateCarCategory;
use App\Livewire\CarCategory\EditCarCategory;
use App\Livewire\Enquiry\AllEnquiry;
use App\Livewire\Enquiry\ViewEnquiry;
use App\Livewire\HeroBanner\EditHeroBanner;
use App\Livewire\SiteSettings\EditSiteSettings;
use App\Models\Car;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', Login::class)->name('login');
});

Route::prefix('/dashboard')->group(function () {
    Route::middleware(['check.isAdmin'])->group(function () {
        //only admin can access these routes
        Route::get('/', function () {
            return view('pages.adminAuth.dashboard');
        })->name('admin.dashboard');
        // site settings tab
        Route::get('/settings', EditSiteSettings::class)->name("admin.settings");
        Route::get('/hero-banner', EditHeroBanner::class)->name("admin.herobanner");

        //media routes
        Route::get('/media', function () {
            return view('pages.adminAuth.media');
        })->name("admin.media");
        //car category routes
        Route::get('/car-category', AllCarCategories::class)->name("admin.carcategory");
        Route::get('/car-category/create', CreateCarCategory::class)->name("admin.carcategory.create");
        Route::get('/car-category/edit/{categorySlug}', EditCarCategory::class)->name("admin.carcategory.edit");
        //car routes
        Route::get('/car', AllCars::class)->name("admin.car");
        Route::get('/car/create', CreateCar::class)->name("admin.car.create");
        Route::get('/car/edit/{carSlug}', EditCar::class)->name("admin.car.edit");
        // Enquires
        Route::get('/enquiry', AllEnquiry::class)->name("admin.enquiry");
        Route::get('/enquiry/{enquiryId}', ViewEnquiry::class)->name("admin.enquiry.view");

    });
});
// cars
Route::get('/cars', CarIndex::class)->name("cars");
// 404 page
Route::get('/404', function () {
    return response()->view('errors.404', [], 404);
})->name('notFound');