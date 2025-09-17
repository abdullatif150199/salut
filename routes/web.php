<?php

use App\Http\Controllers\Backend\ApplicantController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\VisitorController;
use App\Http\Controllers\Backend\YoutubeController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Middleware\TrackVisitor;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware([TrackVisitor::class])->group(function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/articles/{slug}', [HomeController::class, 'detailArticle'])->name('article.detail');
    // Your routes here
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/api/visitors/monthly', [VisitorController::class, 'getMonthlyVisitorStats']);
Route::get('/api/visitors/weekly', [VisitorController::class, 'getWeeklyVisitorStats']);
Route::post('/export-visitors', [VisitorController::class, 'export'])->name('visitors.export');
Route::post('/wa-form', [ApplicantController::class, 'store'])->name('waform.store');



Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/articles', ArticleController::class);
    Route::resource('youtube', YoutubeController::class);
    Route::resource('/galleries', GalleryController::class);
    Route::resource('/testimonials', TestimonialController::class);
    Route::resource('/faqs', FaqController::class);
    Route::get('/settings', [SettingController::class, 'show'])->name('settings.show');
    Route::post('/settings', [SettingController::class, 'store'])->name('settings.store');
    Route::put('/settings/{setting}', [SettingController::class, 'update'])->name('settings.update');
});
