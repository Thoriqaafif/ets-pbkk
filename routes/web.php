<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product/add', [ProductController::class, 'add'])->name('product.add');   
    Route::post('/product/new', [ProductController::class, 'new'])->name('product.new');   

    Route::get('/product', [ProductController::class, 'show'])->name('product.show'); 
    Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/product{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product{id}', [ProductController::class, 'destroy'])->name('product.destroy');

});

require __DIR__.'/auth.php';
