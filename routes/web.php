<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


// Admin All Route 


Route::controller(DemoController::class)->group(function () {
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});

// Home Slide All Route 
Route::controller(HomeSliderController::class)->group(function () {
    
    Route::post('/update/slider', 'UpdateSlider')->name('update.slider');  
});

// About Page All Route 
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'AboutPage')->name('about.page');
    Route::post('/update/about', 'UpdateAbout')->name('update.about');
    Route::get('/about/multi/image', 'AboutMultiImage')->name('about.multi.image');
    // Route::post('/store/multi/image', 'StoreMultiImage')->name('store.multi.image');
    Route::get('/all/multi/image', 'AllMultiImage')->name('all.multi.image');
    Route::get('/edit/multi/image/{id}', 'EditMultiImage')->name('edit.multi.image');
    Route::post('/update/multi/image', 'UpdateMultiImage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'DeleteMultiImage')->name('delete.multi.image');  
});

// Porfolio All Route 
Route::controller(PortfolioController::class)->group(function () {
    Route::get('/all/portfolio', 'AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio', 'AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'StorePortfolio')->name('store.protfolio');
    Route::get('/edit/portfolio/{id}', 'EditPortfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'UpdatePortfolio')->name('update.protfolio');
    Route::get('/delete/portfolio/{id}', 'DeletePortfolio')->name('delete.portfolio');
    Route::get('/portfolio/details/{id}', 'PortfolioDetails')->name('portfolio.details');
});
 
// Blog Category All Routes 
Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
    Route::post('/store/blog/category', 'StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');     
});

// Blog All Route 
Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'AllBlog')->name('all.blog');
    Route::get('/add/blog', 'AddBlog')->name('add.blog');
    Route::post('/store/blog', 'StoreBlog')->name('store.blog');
    Route::get('/edit/blog/{id}', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'DeleteBlog')->name('delete.blog');
    Route::get('/blog/details/{id}', 'BlogDetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'CategoryBlog')->name('category.blog'); 
});

// Footer All Route 
Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/setup', 'FooterSetup')->name('footer.setup');
    Route::post('/update/footer', 'UpdateFooter')->name('update.footer');
});

// Contact All Route 
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact/message', 'ContactMessage')->name('contact.message');   
    Route::get('/delete/message/{id}', 'DeleteMessage')->name('delete.message');  
});

Route::controller(MainController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
    Route::get('/service', 'service')->name('service');
    Route::get('/portfolio', 'portfolio')->name('portfolio');
    Route::get('/blog', 'blog')->name('blog');

    // CONTACT FUNCTIONALITY
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/store/message', 'storeMessage')->name('store.message');
});

Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password'); 
    });
});

Route::controller(AdminController::class)->group(function () {

    // SLIDER FUNCTIONALITY
    Route::get('/home/slider', 'slider')->name('slider');
    Route::get('/home/slider/create', 'createSlider')->name('create.slider');
    Route::get('/home/slider/update/active/status/{id}', 'updateActiveStatusSlider')->name('slider.update.active.status');
    Route::get('/home/slider/update/inactive/status/{id}', 'updateInactiveStatusSlider')->name('slider.update.inactive.status');
    Route::get('/home/slider/update/active/display/{id}', 'updateActiveDisplaySlider')->name('slider.update.active.display');
    Route::get('/home/slider/update/inactive/display/{id}', 'updateInactiveDisplaySlider')->name('slider.update.inactive.display');
    Route::post('/home/slider/store', 'storeSlider')->name('store.slider');
    Route::get('/home/slider/edit/{id}', 'editSlider')->name('edit.slider');
    Route::post('/home/slider/update/{id}', 'updateSlider')->name('update.slider');

    // ABOUT ME FUNCTIONALITY
    Route::get('/home/about', 'about')->name('about');
    Route::get('/home/about/create', 'createAbout')->name('create.about');
    Route::post('/home/about/store', 'storeAbout')->name('store.about');
    Route::get('/home/about/edit/{id}', 'editAbout')->name('edit.about');

    // MULTI-IMAGE FUNCTIONALITY
    Route::get('/home/multi/image', 'multiImage')->name('multi.image');
    Route::get('/home/multi/image/create', 'createMultiImage')->name('create.multi.image');
    Route::post('/home/multi/image/store', 'storeMultiImage')->name('store.multi.image');
    Route::get('/home/multi/image/edit/{id}', 'editMultiImage')->name('edit.multi.image');
    Route::post('/home/multi/image/update/{id}', 'updateMultiImage')->name('update.multi.image');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';