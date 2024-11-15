<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SubKategoriController;

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



Route::controller(UserController::class)->group(function () {
    Route::get('logout', 'logout')->name('logout');
});


Route::middleware('dashboard.login')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('login', 'loginView');
        Route::post('login', 'login')->name('login');
        Route::get('register', 'registerView');
        Route::post('register', 'register')->name('register');
    });
});

Route::middleware('login.dashboard')->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    });


    Route::controller(KategoriController::class)->group(function () {
        Route::get('/kategori', 'index');
        Route::get('/kategori/addKategori', 'create');
        Route::post('/kategori/addKategori', 'store')->name('addKategori');
        Route::get('/kategori/editKategori/{id}', 'edit');
        Route::post('/kategori/editKategori/{id}', 'update')->name('updateKategori');
        Route::get('/kategori/destroy/{id}', 'destroy');
    });

    Route::controller(SubKategoriController::class)->group(function () {
        Route::get('/subKategori', 'index');
        Route::get('/subKategori/addSubKategori', 'create');
        Route::post('/subKategori/addSubKategori', 'store')->name('addSubKategori');
        Route::get('/subKategori/editSubKategori/{id}', 'edit');
        Route::post('/subKategori/editSubKategori/{id}', 'update');
        Route::get('/subKategori/destroy/{id}', 'destroy');
    });

    Route::controller(ProdukController::class)->group(function () {
        Route::get('/produk', 'index');
        Route::get('/produk/addProduk', 'create');
        Route::post('/produk/addProduk', 'store')->name('addProduk');
        Route::get('/produk/editProduk/{id}', 'edit');
        Route::post('/produk/editProduk/{id}', 'update')->name('editProduk');
        Route::get('/subkategori/{id}', 'getSubkategori');
        Route::post('/Produk/editProduk/{id}', 'update');
        Route::get('/produk/destroy/{id}', 'destroy');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'index');
        Route::post('/profile/update', 'update')->name('update_profile');
    });
});
Route::get('/view', function () {
    return view('webview.index');
});

Route::controller(SliderController::class)->group(function(){
    Route::get('/promosi/banner-slider','index');
    Route::get('/promosi/addsliderview','create');
    Route::post('/promosi/addslider','store')->name('addSlider');
    Route::get('/promosi/edit/{id}','edit');
    Route::post('/promosi/edit/{id}','update');
    Route::get('/promosi/destroy/{id}','destroy');
});


Route::controller(ViewController::class)->group(function(){
    Route::get('/view','index');
    // Route::get('/search','search')->name('search');
});


