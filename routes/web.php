<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;

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

// Фасады роутов основных страниц
Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/about', [MainController::class, 'about'])->name('about');


// Фасады роутов страниц "ОТЗЫВОВ"
Route::get('/reviews', [MainController::class, 'reviews'])->name('reviews');
Route::post('/reviews/check', [MainController::class, 'reviews_check'])->name('reviews-check');
Route::get('/review/{id}', [MainController::class, 'review'])->name('review');
Route::get('/review/{id}/edit}', [MainController::class, 'review_edit'])->name('review-edit');
Route::post('/review/{id}/edit}', [MainController::class, 'review_edit_submit'])->name('review-edit-submit');
Route::get('/review/{id}/delete}', [MainController::class, 'delete_review'])->name('review-delete');


// Фасады роутов работы с АДМИНКОЙ
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'admin'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
