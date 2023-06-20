<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Homepage_Controller;
use App\Http\Controllers\HomeController;
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


Route::middleware(['auth'])->group(function () {
    //
    Route::get('/', [Homepage_Controller::class, 'index'])->name('/');
    Route::get('/index', [Homepage_Controller::class, 'index'])->name('index');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/fetch-bundle-data', [Homepage_Controller::class, 'fetchBundleData'])->name('fetch-bundle-data');

    //recipe
    route::resource('recipe', Recipe_Controller::class);
    route::post('publishrecipe', [Recipe_Controller::class, 'store'])->name('publishrecipe');
    route::post('saverecipe', [Recipe_Controller::class, 'saverecipe'])->name('saverecipe');

    route::get('foodrecipe/{id}', [Recipe_Controller::class, 'foodrecipe'])->name('foodrecipe');
    route::get('bundlerecipe/{id}/{bundlelistid}/{user}', [Recipe_Controller::class, 'bundlerecipe'])->name('bundlerecipe');
    route::get('deletefoodrecipe/{id}', [Recipe_Controller::class, 'deleterecipe'])->name('deleterecipe');

    route::get('editrecipe/{id}', [Recipe_Controller::class, 'editrecipe'])->name('editrecipe');
    route::post('editrecipe/{id}', [Recipe_Controller::class, 'saverecipeedit'])->name('saverecipeedit');

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

    //SEARCH
    Route::get('/searchindex', [Homepage_Controller::class, 'searchindex'])->name('searchindex');
    Route::post('/searchindex', [Homepage_Controller::class, 'searchindexpost'])->name('searchindexpost');
    
    Route::get('/searchbundle', [Bundle_Controller::class, 'searchbundle'])->name('searchbundle');
    Route::post('/searchbundle', [Bundle_Controller::class, 'searchbundlepost'])->name('searchbundlepost');

    Route::get('/searchbookmark', [Bundle_Controller::class, 'searchbookmark'])->name('searchbookmark');
    Route::post('/searchbookmark', [Bundle_Controller::class, 'searchbookmarkpost'])->name('searchbookmarkpost');
    Route::post('/filter', [Homepage_Controller::class, 'filter'])->name('filter');

    Route::get('/accountpage', function () {
        return view('account-page');
    })->name('accountpage');
    
    //ACCOUNT
    Route::post('deleteaccount', [HomeController::class, 'deleteaccount'])->name('deleteaccount');
    Route::post('/userimg', [HomeController::class, 'userimgpost'])->name('userimgpost');
    Route::post('/userusername', [HomeController::class, 'userusernamepost'])->name('userusernamepost');
});

// Password Forget Routes
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

// Password Verification Routes
Route::get('verification-password', [ForgotPasswordController::class, 'showverificationfrom'])->name('verification.password.get');
Route::post('verification-password', [ForgotPasswordController::class, 'submitverificationfrom'])->name('verification.password.post');

// Password Reset Routes
Route::get('reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

Auth::routes();

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');


