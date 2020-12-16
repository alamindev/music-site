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
Route::get('/about-us', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');




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
Route::get('/social-address-info', [App\Http\Controllers\Admin\SocialInfoController::class, 'index'])->name('socialinfos');
Route::post('/social-address-info/update', [App\Http\Controllers\Admin\SocialInfoController::class, 'update'])->name('socialinfo.update');

});
