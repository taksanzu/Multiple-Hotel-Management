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
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SettingImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\WelcomeController;
use App\Mail\MyTestMaill;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;

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
Route::get('/login', [AuthenticationController::class, 'loginIndex'] )->name('login')->middleware('redirect.subdomain.login');
Route::post('/login', [AuthenticationController::class, 'loginStore'] )->name('login.store');
Route::post('/changePassword', [AuthenticationController::class, 'changePassword'] )->name('changePassword');

// Xử lý trang chủ khi đăng nhập thành công
Route::controller(UserHomeController::class)->group(function () {
    Route::get('/userHome', [UserHomeController::class, 'index'])->name('userHome');
    Route::get('/userHome/accept/{id}', [UserHomeController::class, 'accept'])->name('userHome.accept');
    Route::get('/userHome/cancel/{id}', [UserHomeController::class, 'cancel'])->name('userHome.cancel');
    Route::get('/userHome/{id}', [UserHomeController::class, 'getBooking'])->name('userHome.booking');
});
// Xử lý trang chủ admin
Route::get('/adminHome', [App\Http\Controllers\AdminHomeController::class, 'index'])->name('adminHome');
// Xử lý đăng xuất
Route::get('/logout', [AuthenticationController::class, 'logout'] )->name('logout');

// Xử lý trang tin tức
Route::controller(NewsController::class)->group(function () {
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/news/search', [NewsController::class, 'index'])->name('news.search');
    Route::post('/news',[NewsController::class, 'store'])->name('news.store');
    Route::get('/news/{id}',[NewsController::class, 'getNews'])->name('news.edit');
    Route::get('/news/delete/{id}',[NewsController::class, 'delete'])->name('news.delete');
    Route::get('/news/post/{id}',[NewsController::class, 'postNews'])->name('news.post');
});

//Xử lý thêm ảnh từ ckeditor
Route::post('/ckeditor/upload', [CkeditorController::class, 'uploadImage'])->name('ckeditor.upload');

// Xử lý trang loại phòng
Route::controller(RoomsController::class)->group(function () {
    Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms');
    Route::get('/rooms/search', [RoomsController::class, 'index'])->name('rooms.search');
    Route::post('/rooms', [RoomsController::class, 'store'])->name('rooms.store');
    Route::get('/rooms/{id}',[RoomsController::class, 'getRooms'])->name('rooms.edit');
    Route::get('/rooms/delete/{id}',[RoomsController::class, 'deleteRooms'])->name('rooms.delete');
    Route::get('/rooms/delete/image/{id}',[RoomsController::class, 'deleteImages'])->name('rooms.delete.image');
    Route::get('/rooms/post/{id}',[RoomsController::class, 'postRooms'])->name('rooms.post');
});

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
Route::get('/', [WelcomeController::class, 'index'])->name('welcome')->middleware('checkuser');

// Xử lý loại phòng chính
Route::middleware('checkuser')->group(function () {
    Route::get('/loaiphong', [MainRoomsController::class, 'index'])->name('loaiphong.index');
    Route::get('/loaiphong/{id}/{slug}', [MainRoomsController::class, 'detail'])->name('loaiphong.detail');
});

// Xử lý tin tức chính
Route::prefix('')->middleware('checkuser')->group(function () {
    Route::get('/tintuc', [MainNewsController::class, 'index'])->name('tintuc.index');
    Route::get('/tintuc/{id}/{slug}', [MainNewsController::class, 'detail'])->name('tintuc.detail');
});

// Xử lý hình ảnh chính
Route::get('/hinhanh', [MainImagesController::class, 'index'])->name('hinhanh.index')->middleware('checkuser');

//Xử lý tiện ích chính
Route::middleware('checkuser')->group(function () {
    Route::get('/tienich', [MainServicesController::class, 'index'])->name('tienich.index');
    Route::get('/tienich/{id}/{slug}', [MainServicesController::class, 'detail'])->name('tienich.detail');
});

// Xử lý đặt phòng
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Xử lý trang quản lý người dùng
Route::controller(UserController::class)->group(function () {
    Route::get('/userList', [UserController::class, 'index'])->name('userList');
    Route::post('/userList', [UserController::class, 'store'])->name('userList.store');
    Route::get('/userList/{id}', [UserController::class, 'getUser'])->name('userList.edit');
    Route::get('/userList/delete/{id}', [UserController::class, 'delete'])->name('userList.delete');
});

// Xử lý trang cấu hình
Route::controller(SettingController::class)->group(function () {
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting', [SettingController::class, 'store'])->name('setting.store');
});

// Xử lý trang cấu hình ảnh
Route::controller(SettingImageController::class)->group(function () {
    Route::get('/settingImage', [SettingImageController::class, 'index'])->name('settingImage');
    Route::post('/settingImage', [SettingImageController::class, 'store'])->name('settingImage.store');
});

Route::controller(ServiceController::class)->group(function () {
    Route::get('/services', [\App\Http\Controllers\ServiceController::class, 'index'])->name('services');
    Route::post('/services/category', [\App\Http\Controllers\ServiceController::class, 'storeCategory'])->name('services.category');
    Route::post('/services', [\App\Http\Controllers\ServiceController::class, 'storeService'])->name('services.store');
    Route::post('/services/change_status', [\App\Http\Controllers\ServiceController::class, 'change_status'])->name('services.change_status');
});

Route::controller(\App\Http\Controllers\SettingTemplateController::class)->group(function () {
    Route::get('/settingTemplate', [\App\Http\Controllers\SettingTemplateController::class, 'index'])->name('settingTemplate');
    Route::get('/settingTemplate/changeTemplateMau1', [\App\Http\Controllers\SettingTemplateController::class, 'changeTemplateMau1'])->name('settingTemplate.changeTemplateMau1');
    Route::get('/settingTemplate/changeTemplateMau2', [\App\Http\Controllers\SettingTemplateController::class, 'changeTemplateMau2'])->name('settingTemplate.changeTemplateMau2');
});

