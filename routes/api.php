<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\CoursesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/feature-courses',[CoursesController::class,'index']);
Route::get('/courses',[CoursesController::class,'courses']);
Route::get('/single',[CoursesController::class,'single']);
Route::get('/archive',[CoursesController::class,'archive']);
Route::get('/filter-content',[CoursesController::class,'filterContent']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
