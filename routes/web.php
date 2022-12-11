<?php
use App\Http\Controllers\Home;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
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

Route::get('/bookXchange',[Home::class, 'home']);
Route::get('/bookXchange/home',[Home::class, 'home']);

Route::get('/bookXchange/about',[Home::class, 'about']);
Route::get('/bookXchange/signin',[Home::class, 'signin']);
Route::get('/bookXchange/signup',[Home::class, 'signup']);
//Route for signin
Route::post('bookXchange/getSignin',[UserController::class, 'getSignin'])->name('UserController.getSignin');
//Route for signup
Route::post('bookXchange/getSignUp',[UserController::class, 'getSignUp'])->name('UserController.getSignUp');
//middleware authentication 
Route::group(['middleware' => 'user_auth'], function() {
    Route::get('/bookXchange/dashboard',[DashboardController::class, 'dashboard']);
    Route::get('/bookXchange/logout',[UserController::class, 'logout']);
    Route::get('/bookXchange/addbook', [BookController::class, 'addbook']);
    Route::get('/bookXchange/myaccount', [UserController::class, 'myaccount']);
   
});