<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminReviewsController;

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
Route::get('/', [MainController::class, 'welcome'])->name('main');
Route::get('/about', [MainController::class, 'about'])->name('about');


// Фасады роутов страниц "ОТЗЫВОВ"
Route::get('/reviews', [MainController::class, 'reviews'])->name('reviews');
Route::post('/reviews/check', [MainController::class, 'reviews_check'])->name('reviews-check');
Route::get('/review/{id}', [MainController::class, 'review'])->name('review');


// Фасады роутов работы с АДМИНКОЙ
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'admin'])->name('home');

// Фасады роутов для работы с ОТЗЫВАМИ 
Route::get('/home', [AdminReviewsController::class, 'show_all_reviews'])->name('home-reviews');
Route::get('/home/review/{id}/delete}', [AdminReviewsController::class, 'delete_review'])->name('home-review-delete');
Route::get('/home/review/{id}/edit}', [AdminReviewsController::class, 'edit_review'])->name('review-edit');
Route::post('/home/review/{id}/edit}', [AdminReviewsController::class, 'review_edit_submit'])->name('review-edit-submit');

// Фасады роутов работы с ПРОФИЛЕМ ПОЛЬЗОВАТЕЛЯ    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
