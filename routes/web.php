<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::redirect('/password/reset','/reset-password');
Route::get('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'resetpasswordview'])->name('reset-password');
Route::post('/reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'resetpassword'])->name('reset-password-post');
Route::get('/reset-password/confirm', [App\Http\Controllers\Auth\ResetPasswordController::class, 'resetvew'])->name('reset-view');
Route::post('/reset-password/confirm', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('reset');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/profile/update', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('profile.update');
Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'update'])->name('profile.update.post');

Route::get('/select-book', [App\Http\Controllers\StepController::class, 'index'])->name('step.book');
Route::get('/instrument', [App\Http\Controllers\StepController::class, 'instrument'])->name('step.instrument');
Route::get('/exercise', [App\Http\Controllers\StepController::class, 'exercise'])->name('step.exercise');
Route::get('/viewer', [App\Http\Controllers\StepController::class, 'viewer'])->name('step.viewer');




Route::get('/{slug?}', [App\Http\Controllers\PageController::class, 'index'])->name('page');
/**
 * start coding for backend route
 * 
 */


Route::group(['prefix' => 'admin'], function() {
    Route::get('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'loginView'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'login'])->name('admin.login.post');
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\LoginController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.home');
    Route::get('/setting', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('setting');
    Route::post('/setting/update/{id?}', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('setting.update');
    //for book
    Route::get('/book', [App\Http\Controllers\Admin\BookController::class, 'index'])->name('book');
    Route::post('/book/store', [App\Http\Controllers\Admin\BookController::class, 'store'])->name('book.store');
    Route::get('/book/edit/{id}', [App\Http\Controllers\Admin\BookController::class, 'edit'])->name('book.edit');
    Route::post('/book/update/{id}', [App\Http\Controllers\Admin\BookController::class, 'update'])->name('book.update');
    Route::delete('/book/destroy/{id}', [App\Http\Controllers\Admin\BookController::class, 'destroy'])->name('book.destroy');
    //for Horn
    Route::get('/instrument', [App\Http\Controllers\Admin\HornController::class, 'index'])->name('instrument');
    Route::post('/instrument/store', [App\Http\Controllers\Admin\HornController::class, 'store'])->name('instrument.store');
    Route::get('/instrument/edit/{id}', [App\Http\Controllers\Admin\HornController::class, 'edit'])->name('instrument.edit');
    Route::post('/instrument/update/{id}', [App\Http\Controllers\Admin\HornController::class, 'update'])->name('instrument.update');
    Route::delete('/instrument/destroy/{id}', [App\Http\Controllers\Admin\HornController::class, 'destroy'])->name('instrument.destroy');

    //for exercise
    Route::get('/exercise', [App\Http\Controllers\Admin\ExerciseController::class, 'index'])->name('exercise');
    Route::post('/exercise/store', [App\Http\Controllers\Admin\ExerciseController::class, 'store'])->name('exercise.store');
    Route::get('/exercise/edit/{id}', [App\Http\Controllers\Admin\ExerciseController::class, 'edit'])->name('exercise.edit');
    Route::post('/exercise/update/{id}', [App\Http\Controllers\Admin\ExerciseController::class, 'update'])->name('exercise.update');
    Route::delete('/exercise/destroy/{id}', [App\Http\Controllers\Admin\ExerciseController::class, 'destroy'])->name('exercise.destroy');

    //for social-address-info
    Route::get('/social-address-info', [App\Http\Controllers\Admin\SocialInfoController::class, 'index'])->name('socialinfos');
    Route::post('/social-address-info/update', [App\Http\Controllers\Admin\SocialInfoController::class, 'update'])->name('socialinfo.update');
    Route::get('/pages', [App\Http\Controllers\Admin\PageController::class, 'index'])->name('pages');
    Route::get('/page/create', [App\Http\Controllers\Admin\PageController::class, 'create'])->name('page.create');
    Route::post('/page/store', [App\Http\Controllers\Admin\PageController::class, 'store'])->name('page.store');
    Route::get('/page/edit/{id}', [App\Http\Controllers\Admin\PageController::class, 'edit'])->name('page.edit');
    Route::get('/page/view/{id}', [App\Http\Controllers\Admin\PageController::class, 'show'])->name('page.show');
    Route::post('/page/update/{id}', [App\Http\Controllers\Admin\PageController::class, 'update'])->name('page.update');
    Route::delete('/page/destroy/{id}', [App\Http\Controllers\Admin\PageController::class, 'destroy'])->name('page.destroy');
    Route::post('/page/uploads',  [App\Http\Controllers\Admin\PageController::class, 'upload']);
    Route::get('/page/file_browser',[App\Http\Controllers\Admin\PageController::class, 'fileBrowser']);

    Route::get('/banner', [App\Http\Controllers\Admin\BannerController::class, 'index'])->name('banner');
    Route::post('/banner/update/{id?}', [App\Http\Controllers\Admin\BannerController::class, 'update'])->name('banner.update');
});
