<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/bulletins', [BulletinController::class, 'index'])->name('bulletin.index');
Route::get('/bulletins/{bulletin}/', [BulletinController::class, 'detail'])->name('bulletin.detail');
Auth::routes();
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/add', [AdminController::class, 'store'])->name('admin.store');
Route::post('/admin/add', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/{bulletin}/edit', [AdminController::class, 'edit'])->name('admin.edit')->middleware('can:update,bulletin');
Route::get('/admin/{bulletin}/update', [AdminController::class, 'edit'])->name('admin.edit')->middleware('can:update,bulletin');
Route::post('/admin/{bulletin}/update', [AdminController::class, 'update'])->name('admin.update')->middleware('can:update,bulletin');
Route::match(['GET','DELETE'],'/admin/{bulletin}/delete', [AdminController::class, 'delete'])->name('admin.delete')->middleware('can:delete,bulletin');