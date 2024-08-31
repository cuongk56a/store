<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SettingController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('')->controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/category/{slug}/{id}','getCategoryProduct')->name('category.product');
    Route::get('/login', 'getLogin')->name('getLogin');
    Route::post('/login','postLogin')->name('postLogin');
    Route::post('/register','postRegister')->name('postRegister');
    Route::get('/logout','getLogout')->name('getLogout');
    Route::get('/account/{name}','getAccount')->name('getAccount');
});

Route::prefix('products')->controller(ProductController::class)->group(function(){
    Route::get('/', 'getProduct')->name('products.get');
    Route::get('/{id}/detail','show')->name('products.show');
    Route::get('/search', 'listSearchProduct')->name('products.listSearch');
});

Route::prefix('carts')->controller(OrderController::class)->group(function(){
    Route::get('/{id}/add-to-cart','addToCart')->name('cart.add');
    Route::get('/','showCart')->name('cart.show');
    Route::get('/update','updateCart')->name('cart.update');
    Route::get('/delete','deleteCart')->name('cart.delete');
});


Route::prefix('admin')->group(function(){

    Route::get('/home', function () {
        return view('admin.home');
    })->name('admin.home');

    Route::prefix('')->controller(AdminController::class)->group(function(){
        Route::get('/', 'getLoginAdmin');
        Route::post('/','postLoginAdmin');
    });
    
    Route::prefix('categories')->controller(CategoryController::class)->group(function () {
        Route::get('/', 'index')->name('categories.index')->middleware('can:category-list');
        Route::get('/create', 'create')->name('categories.create')->middleware('can:category-add');
        Route::post('/','store')->name('categories.store');
        Route::get('/{id}/edit', 'edit')->name('categories.edit')->middleware('can:category-edit');
        // Route::match(['PUT','PATH'],'/{id}','update')->name('categories.update');
        Route::post('/{id}/update', 'update')->name('categories.update');
        Route::get('/{id}', 'destroy')->name('categories.destroy')->middleware('can:category-delete');
    });
    
    Route::prefix('menus')->controller(MenuController::class)->group(function () {
        Route::get('/', 'index')->name('menus.index')->middleware('can:menu-list');
        Route::get('/create', 'create')->name('menus.create')->middleware('can:menu-create');
        Route::post('/','store')->name('menus.store');
        Route::get('/{id}/edit', 'edit')->name('menus.edit')->middleware('can:menu-edit');
        Route::post('/{id}/update', 'update')->name('menus.update');
        Route::get('/{id}', 'destroy')->name('menus.destroy')->middleware('can:menu-delete');
    });

    Route::prefix('products')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('products.index')->middleware('can:product-list');
        Route::get('/create', 'create')->name('products.create')->middleware('can:product-add');
        Route::post('/','store')->name('products.store');
        Route::get('/{id}/edit', 'edit')->name('products.edit')->middleware('can:product-edit,id');
        Route::post('/{id}/update', 'update')->name('products.update');
        Route::get('/{id}', 'destroy')->name('products.destroy')->middleware('can:product-delete,id');
    });

    Route::prefix('sliders')->controller(SliderController::class)->group(function () {
        Route::get('/', 'index')->name('sliders.index')->middleware('can:slider-list');
        Route::get('/create', 'create')->name('sliders.create')->middleware('can:slider-add');
        Route::post('/','store')->name('sliders.store');
        Route::get('/{id}/edit', 'edit')->name('sliders.edit')->middleware('can:slider-edit');
        Route::post('/{id}/update', 'update')->name('sliders.update');
        Route::get('/{id}', 'destroy')->name('sliders.destroy')->middleware('can:slider-delete');
    });

    Route::prefix('settings')->controller(SettingController::class)->group(function () {
        Route::get('/', 'index')->name('settings.index')->middleware('can:setting-list');
        Route::get('/create', 'create')->name('settings.create')->middleware('can:setting-add');
        Route::post('/','store')->name('settings.store');
        Route::get('/{id}/edit', 'edit')->name('settings.edit')->middleware('can:setting-edit');
        Route::post('/{id}/update', 'update')->name('settings.update');
        Route::get('/{id}', 'destroy')->name('settings.destroy')->middleware('can:setting-delete');
    });

    Route::prefix('users')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->name('users.index')->middleware('can:user-list');
        Route::get('/create', 'create')->name('users.create')->middleware('can:user-add');
        Route::post('/','store')->name('users.store');
        Route::get('/{id}/edit', 'edit')->name('users.edit')->middleware('can:user-edit');
        Route::post('/{id}/update', 'update')->name('users.update');
        Route::get('/{id}', 'destroy')->name('users.destroy')->middleware('can:user-delete');
    });

    Route::prefix('roles')->controller(RoleController::class)->group(function () {
        Route::get('/', 'index')->name('roles.index')->middleware('can:role-list');
        Route::get('/create', 'create')->name('roles.create')->middleware('can:role-add');
        Route::post('/','store')->name('roles.store');
        Route::get('/{id}/edit', 'edit')->name('roles.edit')->middleware('can:role-edit');
        Route::post('/{id}/update', 'update')->name('roles.update');
        Route::get('/{id}', 'destroy')->name('roles.destroy')->middleware('can:role-delete');;
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

