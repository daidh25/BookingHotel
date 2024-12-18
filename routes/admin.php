<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

// localhost:8000/admin/
Route::prefix('admin')->group(function () {
  // localhost:8000/admin/owner
  Route::prefix('owner')->group(function () {
    // Lấy danh sách của tất cả chủ khách sạn
    Route::get('/accounts', [OwnerController::class, 'index'])->withTrashed()->name('admin_owner.index');

    // Hiển thị trang tạo tài khoản
    Route::get('/account/new', [OwnerController::class, 'create'])->name('admin_owner.create');
    // Tạo tài khoản chủ khách sạn
    Route::post('/account/new', [OwnerController::class, 'store'])->name('admin_owner.store');
    // Hiển thị trang chi tiết 1 tài khoản để sửa
    Route::get('/account/{id}', [OwnerController::class, 'edit'])->name('admin_owner.edit');
    // Sua thong tin
    Route::put('/account/{id}', [OwnerController::class, 'update'])->name('admin_owner.update');
    // Xoa
    Route::delete('/account/{id}', [OwnerController::class, 'destroy'])->name('admin_owner.delete');
  });

  // localhost:8000/admin/user
  Route::prefix('user')->group(function () {
    // Lấy danh sách của tất cả user
    Route::get('/accounts', [UserController::class, 'index'])->withTrashed()->name('admin_user.index');
    // Hiển thị trang chi tiết 1 tài khoản để sửa
    Route::get('/account/{id}', [UserController::class, 'edit'])->name('admin_user.edit');
    // Sua thong tin
    Route::put('/account/{id}', [ProfileUserController::class, 'update'])->name('admin_user.update');
    // Xoa
    Route::delete('/account/{id}', [UserController::class, 'destroy'])->name('admin_user.delete');
  });
});
