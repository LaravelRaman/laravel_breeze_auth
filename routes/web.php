<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


route::get('admin/dashboard',[HomeController::class, 'index'])->middleware(['auth','admin']);
route::get('admin/create-user',[HomeController::class, 'createUser'])->middleware(['auth','admin'])->name('user.create');
route::post('admin/store-user',[HomeController::class, 'storeUser'])->middleware(['auth','admin'])->name('user.store');
route::post('admin/destroy/{id}',[HomeController::class, 'destroy'])->middleware(['auth','admin'])->name('user.destroy');
