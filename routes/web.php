<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('/blogs/{slug}', [App\Http\Controllers\HomeController::class, 'blogShow'])->name('blogShow');
Route::get('/agents', [App\Http\Controllers\HomeController::class, 'agents'])->name('agents');
Route::post('/save-contact-us',[App\Http\Controllers\HomeController::class, 'saveContact'])->name('saveContact');
Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class,'index'])->name('admin.dashboard')->middleware('auth');
Route::get('/property/{type}', [App\Http\Controllers\PropertyController::class,'index'])->name('propertyList');
Route::group(['prefix' => 'features', 'as' => 'feature.','middleware'=>'auth'], function () {
    Route::get('/list', [App\Http\Controllers\Admin\FeatureController::class,'index'])->name('featureList');
    Route::post('/store', [App\Http\Controllers\Admin\FeatureController::class,'store'])->name('featureStore');
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\FeatureController::class,'edit'])->name('featureEdit');
    Route::get('/delete/{id}', [App\Http\Controllers\Admin\FeatureController::class,'delete'])->name('featureDelete');
    // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
});
Route::group(['prefix' => 'properties', 'as' => 'property.','middleware'=>'auth'], function () {
    Route::get('/list', [App\Http\Controllers\Admin\PropertyController::class,'index'])->name('propertyList');
    Route::get('/create', [App\Http\Controllers\Admin\PropertyController::class,'create'])->name('propertyCreate');
    Route::get('/featureListing', [App\Http\Controllers\Admin\PropertyController::class,'getFurnishingList'])->name('featureListing');
    Route::post('/store', [App\Http\Controllers\Admin\PropertyController::class,'store'])->name('propertyStore');
    Route::get('/delete/{id}', [App\Http\Controllers\Admin\PropertyController::class,'delete'])->name('propertyDelete');
    Route::post('/upload-image', [App\Http\Controllers\Admin\PropertyController::class,'uploadImage'])->name('propertyImageUpload');
    
    Route::get('/edit/{id}', [App\Http\Controllers\Admin\PropertyController::class,'edit'])->name('propertyEdit');
    Route::get('/remove-image', [App\Http\Controllers\Admin\PropertyController::class,'removeImage'])->name('removeImage');
    // Route::get('/delete/{id}', [App\Http\Controllers\Admin\FeatureController::class,'delete'])->name('featureDelete');
    // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
});
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']], function(){
    Route::group(['prefix' => 'users', 'as' => 'user.'], function () {
        Route::get('/list', [App\Http\Controllers\Admin\UserController::class,'index'])->name('userList');
        Route::post('/store', [App\Http\Controllers\Admin\UserController::class,'store'])->name('userStore');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\UserController::class,'edit'])->name('userEdit');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\UserController::class,'delete'])->name('userDelete');
        // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
    });
    Route::group(['prefix' => 'roles', 'as' => 'role.'], function () {
        Route::get('/list', [App\Http\Controllers\Admin\RoleController::class,'index'])->name('roleList');
        // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
    });
    Route::group(['prefix' => 'categories', 'as' => 'category.'], function () {
        Route::get('/list', [App\Http\Controllers\Admin\CategoryController::class,'index'])->name('categoryList');
        Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class,'store'])->name('categoryStore');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class,'edit'])->name('categoryEdit');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\CategoryController::class,'delete'])->name('categoryDelete');
        // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
    });
  
    Route::group(['prefix' => 'services', 'as' => 'service.'], function () {
        Route::get('/list', [App\Http\Controllers\Admin\ServicesController::class,'index'])->name('serviceList');
        Route::get('/create', [App\Http\Controllers\Admin\ServicesController::class,'create'])->name('serviceCreate');
        Route::post('/store', [App\Http\Controllers\Admin\ServicesController::class,'store'])->name('serviceStore');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\ServicesController::class,'delete'])->name('serviceDelete');
        
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\ServicesController::class,'edit'])->name('serviceEdit');
        // Route::get('/delete/{id}', [App\Http\Controllers\Admin\FeatureController::class,'delete'])->name('featureDelete');
        // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
    });
    Route::group(['prefix' => 'testimonials', 'as' => 'testimonial.'], function () {
        Route::get('/list', [App\Http\Controllers\Admin\TestimonialController::class,'index'])->name('testimonialList');
        Route::get('/create', [App\Http\Controllers\Admin\TestimonialController::class,'create'])->name('testimonialCreate');
        Route::post('/store', [App\Http\Controllers\Admin\TestimonialController::class,'store'])->name('testimonialStore');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\TestimonialController::class,'delete'])->name('testimonialDelete');
        
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\TestimonialController::class,'edit'])->name('testimonialEdit');
        // Route::get('/delete/{id}', [App\Http\Controllers\Admin\FeatureController::class,'delete'])->name('featureDelete');
        // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
    });
    Route::group(['prefix' => 'contents', 'as' => 'content.'], function () {
        Route::get('/list', [App\Http\Controllers\Admin\ContentController::class,'index'])->name('contentList');
        Route::get('/create', [App\Http\Controllers\Admin\ContentController::class,'create'])->name('contentCreate');
        Route::post('/store', [App\Http\Controllers\Admin\ContentController::class,'store'])->name('contentStore');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\ContentController::class,'delete'])->name('contentDelete');
        
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\ContentController::class,'edit'])->name('contentEdit');
        // Route::get('/delete/{id}', [App\Http\Controllers\Admin\FeatureController::class,'delete'])->name('featureDelete');
        // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
    });
    Route::group(['prefix' => 'sliders', 'as' => 'slider.'], function () {
        Route::get('/list', [App\Http\Controllers\Admin\SliderController::class,'index'])->name('sliderList');
        Route::get('/create', [App\Http\Controllers\Admin\SliderController::class,'create'])->name('sliderCreate');
        Route::post('/store', [App\Http\Controllers\Admin\SliderController::class,'store'])->name('sliderStore');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\SliderController::class,'delete'])->name('sliderDelete');
        
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\SliderController::class,'edit'])->name('sliderEdit');
        // Route::get('/delete/{id}', [App\Http\Controllers\Admin\FeatureController::class,'delete'])->name('featureDelete');
        // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
    });
    Route::group(['prefix' => 'blogs', 'as' => 'blog.'], function () {
        Route::get('/list', [App\Http\Controllers\Admin\BlogController::class,'index'])->name('blogList');
        Route::get('/create', [App\Http\Controllers\Admin\BlogController::class,'create'])->name('blogCreate');
        Route::post('/store', [App\Http\Controllers\Admin\BlogController::class,'store'])->name('blogStore');
        Route::get('/delete/{id}', [App\Http\Controllers\Admin\BlogController::class,'delete'])->name('blogDelete');
        
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\BlogController::class,'edit'])->name('blogEdit');
        // Route::get('/delete/{id}', [App\Http\Controllers\Admin\FeatureController::class,'delete'])->name('featureDelete');
        // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
    });
    Route::group(['prefix' => 'settings', 'as' => 'setting.'], function () {
        Route::get('/', [App\Http\Controllers\Admin\SettingController::class,'index'])->name('setting');
        Route::post('/store', [App\Http\Controllers\Admin\SettingController::class,'store'])->name('settingStore');
        // Route::get('/create', [App\Http\Controllers\Admin\BlogController::class,'create'])->name('blogCreate');
        // Route::post('/store', [App\Http\Controllers\Admin\BlogController::class,'store'])->name('blogStore');
        // Route::get('/delete/{id}', [App\Http\Controllers\Admin\BlogController::class,'delete'])->name('blogDelete');
        
        // Route::get('/edit/{id}', [App\Http\Controllers\Admin\BlogController::class,'edit'])->name('blogEdit');
        // Route::get('/delete/{id}', [App\Http\Controllers\Admin\FeatureController::class,'delete'])->name('featureDelete');
        // Route::get('/userPackages/{id}', [App\Http\Controllers\Admin\UserController::class,'userReferralPackages'])->name('userReferralPackages');
    });
});
Route::get('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin-login');


