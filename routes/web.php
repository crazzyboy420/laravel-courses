<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\PlatformContrller;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\SeriesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [CourseController::class,'index'])->name('home');

Route::get('/course/{slug}',[CourseController::class,'show'])->name('course');
Route::get('/courses',[CourseController::class,'courses'])->name('courses');
Route::get('/books',[CourseController::class,'books'])->name('books');
Route::get('/topics/{slug}',[TopicsController::class,'index'])->name('topics');
Route::get('/platform/{slug}',[PlatformContrller::class,'index'])->name('platform');
Route::get('/level/{slug}',[LevelsController::class,'index'])->name('level');
Route::get('/series/{slug}',[SeriesController::class,'index'])->name('series');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
