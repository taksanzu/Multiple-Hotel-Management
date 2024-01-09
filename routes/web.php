<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\userHomeController;
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

Route::get('/', function () {
    return view('pages.welcome');
});

// Xử lý đăng nhập
Route::get('/login', [AuthenticationController::class, 'loginIndex'] )->name('login');
Route::post('/login', [AuthenticationController::class, 'loginStore'] )->name('login.store');

// Xử lý trang chủ khi đăng nhập thành công
Route::get('/userHome',[UserHomeController::class, 'index'])->name('userHome');

// Xử lý đăng xuất
Route::get('/logout', [AuthenticationController::class, 'logout'] )->name('logout');

// Xử lý trang tin tức
Route::get('/news',[NewsController::class, 'index'])->name('news');

// Xử lý trang thêm tin tức
Route::post('/news',[NewsController::class, 'store'])->name('news.store');

//Xử lý thêm ảnh từ ckeditor
Route::post('/ckeditor/upload', [CkeditorController::class, 'uploadImage'])->name('ckeditor.upload');

// Xử lý trang sửa tin tức
Route::get('/news/{id}',[NewsController::class, 'getNews'])->name('news.edit');

//Xử lý xóa tin tức
Route::get('/news/delete/{id}',[NewsController::class, 'delete'])->name('news.delete');

// Xử lý trang loại phòng
Route::get('/rooms', [RoomsController::class, 'index'])->name('rooms');

// Xử lý trang thêm loại phòng
Route::post('/rooms', [RoomsController::class, 'store'])->name('rooms.store');

// Xử lý trang sửa loại phòng
Route::get('/rooms/{id}',[RoomsController::class, 'getRooms'])->name('rooms.edit');

//Xử lý xóa loại phòng
Route::get('/rooms/delete/{id}',[RoomsController::class, 'deleteRooms'])->name('rooms.delete');

// Xử lý xóa ảnh loại phòng
Route::get('/rooms/delete/image/{id}',[RoomsController::class, 'deleteImages'])->name('rooms.delete.image');
