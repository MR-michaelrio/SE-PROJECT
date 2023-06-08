<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage_Controller;
use App\Http\Controllers\Bundle_Controller;
use App\Http\Controllers\Recipe_Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;

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

Route::get('/', [Homepage_Controller::class, 'index'])->name('/');
Route::get('/index', [Homepage_Controller::class, 'index'])->name('index');
Route::get('/fetch-bundle-data', [Homepage_Controller::class, 'fetchBundleData'])->name('fetch-bundle-data');
route::resource('recipe', Recipe_Controller::class);

//BUNDLE
route::resource('bundle', Bundle_Controller::class);
Route::get('/mypageindex', [Bundle_Controller::class, 'mypageindex'])->name('mypageindex');
Route::post('/addbundle', [Bundle_Controller::class, 'addbundle'])->name('addbundle');
Route::post('/deletebundle', [Bundle_Controller::class, 'deletebundlelist'])->name('deletebundle');
Route::post('/onbundle', [Bundle_Controller::class, 'onbundle'])->name('onbundle');
Route::post('/offbundle', [Bundle_Controller::class, 'offbundle'])->name('offbundle');

//BOOKMARK
Route::get('/indexbookmark', [Bundle_Controller::class, 'indexbookmark'])->name('indexbookmark');
Route::post('/savebookmark', [Bundle_Controller::class, 'savebookmark'])->name('savebookmark');

// Password Reset Routes
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

Route::get('verification-password', [ForgotPasswordController::class, 'showverificationfrom'])->name('verification.password.get');
Route::post('verification-password', [ForgotPasswordController::class, 'submitverificationfrom'])->name('verification.password.post');

Route::get('reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Auth::routes();

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
