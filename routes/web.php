<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\MainImagesController;
use App\Http\Controllers\MainNewsController;
use App\Http\Controllers\MainRoomsController;
use App\Http\Controllers\MainServicesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\userHomeController;
use App\Http\Controllers\WelcomeController;
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

// Xử lý đăng nhập
Route::get('/login', [AuthenticationController::class, 'loginIndex'] )->name('login');
Route::post('/login', [AuthenticationController::class, 'loginStore'] )->name('login.store');

// Xử lý trang chủ khi đăng nhập thành công
Route::get('/userHome',[UserHomeController::class, 'index'])->name('userHome');

// Xử lý đăng xuất
Route::get('/logout', [AuthenticationController::class, 'logout'] )->name('logout');

// Xử lý trang tin tức
Route::controller(NewsController::class)->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/pagination_ajax', [NewsController::class, 'paginationAjax'])->name('news.pagination_ajax');
    Route::get('/news/search', [NewsController::class, 'index'])->name('news.search');
});

// Xử lý trang thêm tin tức
Route::post('/news',[NewsController::class, 'store'])->name('news.store');

//Xử lý thêm ảnh từ ckeditor
Route::post('/ckeditor/upload', [CkeditorController::class, 'uploadImage'])->name('ckeditor.upload');

// Xử lý trang sửa tin tức
Route::get('/news/{id}',[NewsController::class, 'getNews'])->name('news.edit');

//Xử lý xóa tin tức
Route::get('/news/delete/{id}',[NewsController::class, 'delete'])->name('news.delete');

// Xử lý trang loại phòng
Route::controller(RoomsController::class)->group(function () {
    Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms');
    Route::get('/rooms/pagination_ajax', [RoomsController::class, 'paginationAjax'])->name('rooms.pagination_ajax');
    Route::get('/rooms/search', [RoomsController::class, 'index'])->name('rooms.search');
});

// Xử lý trang thêm loại phòng
Route::post('/rooms', [RoomsController::class, 'store'])->name('rooms.store');

// Xử lý trang sửa loại phòng
Route::get('/rooms/{id}',[RoomsController::class, 'getRooms'])->name('rooms.edit');

//Xử lý xóa loại phòng
Route::get('/rooms/delete/{id}',[RoomsController::class, 'deleteRooms'])->name('rooms.delete');

// Xử lý xóa ảnh loại phòng
Route::get('/rooms/delete/image/{id}',[RoomsController::class, 'deleteImages'])->name('rooms.delete.image');

// Xử lý trang hình ảnh
Route::controller(ImagesController::class)->group(function () {
    Route::get('/imagesgallery', [ImagesController::class, 'index'])->name('images');
    Route::get('/imagesgallery/pagination_ajax', [ImagesController::class, 'paginationAjax'])->name('images.pagination_ajax');
});

// Xử lý trang thêm hình ảnh
Route::post('/imagestore', [ImagesController::class, 'store'])->name('images.store');

// Xử lý trang xem hình ảnh
Route::get('/imagesgallery/{id}',[ImagesController::class, 'getImages'])->name('images.watch');

// Xử lý xóa hình ảnh
Route::get('/imagesgallery/delete/{id}',[ImagesController::class, 'delete'])->name('images.delete');

// Xử lý chào mừng
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Xử lý loại phòng chính
Route::controller(MainRoomsController::class)->group(function () {
    Route::get('/loaiphong', [MainRoomsController::class, 'index'])->name('loaiphong.index');
    Route::get('/loaiphong/{id}', [MainRoomsController::class, 'detail'])->name('loaiphong.detail');
});


// Xử lý tin tức chính
Route::controller(MainNewsController::class)->group(function () {
    Route::get('/tintuc', [MainNewsController::class, 'index'])->name('tintuc.index');
    Route::get('/tintuc/{id}', [MainNewsController::class, 'detail'])->name('tintuc.detail');
});

// Xử lý hình ảnh chính
Route::get('/hinhanh', [MainImagesController::class, 'index'])->name('hinhanh.index');

//Xử lý tiện ích chính
Route::controller(MainServicesController::class)->group(function () {
    Route::get('/tienich', [MainServicesController::class, 'index'])->name('tienich.index');
    Route::get('/tienich/{id}', [MainServicesController::class, 'detail'])->name('tienich.detail');
});

// Xử lý đặt phòng
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
