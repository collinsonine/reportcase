<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/viewcase/{id}', [HomeController::class, 'viewcase']);
Route::get('/allcase', [HomeController::class, 'allcaseses'])->name('case');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/login', [AdminController::class, 'getLogin'])->name('adminLogin');
    Route::post('/login', [AdminController::class, 'postLogin'])->name('adminLoginPost');
    Route::post('/logout', [AdminController::class, 'adminLogout'])->name('logout');

    Route::group(['middleware' => 'adminauth'], function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

        //case Routes
        Route::get('/categories', [HomeController::class, 'categories'])->name('categories.all');
        Route::post('/categories/save', [HomeController::class, 'savecategories'])->name('categories.save');
        Route::get('/case/new', [HomeController::class, 'newcase'])->name('case.new');
        Route::get('/case/all', [HomeController::class, 'allcase'])->name('case.all');
        Route::get('/case/edit/{id}', [HomeController::class, 'editcase'])->name('case.edit');
        Route::post('/case/save', [HomeController::class, 'savecase'])->name('case.save');
        Route::post('/case/update/{id}', [HomeController::class, 'updatecase'])->name('case.update');

        //News Route
        Route::get('/news/new', [HomeController::class, 'newnews'])->name('news.new');
        Route::get('/news/all', [HomeController::class, 'allnews'])->name('news.all');
        Route::post('news/save', [HomeController::class, 'savenews'])->name('news.save');
        Route::get('/news/edit/{id}', [HomeController::class, 'editnews']);
        Route::get('/news/delete/{id}', [HomeController::class, 'deletenews']);
        Route::post('/news/update/{id}', [HomeController::class, 'updatenews']);

    });
});
