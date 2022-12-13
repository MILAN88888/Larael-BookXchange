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
//View book from home page
Route::get('bookXchange/home/viewbook/{id}', [BookController::class, 'viewBook']);
//Book review from home page
Route::get('bookXchange/home/viewbook/bookreview/{id}', [BookController::class, 'bookreview']);
//search book
Route::get('/bookXchange/home/searchbook', [BookController::class, 'searchBook'])->name('BookController.searchbookhome');
//middleware authentication 
Route::group(['middleware' => 'user_auth'], function() {
    Route::get('/bookXchange/dashboard',[DashboardController::class, 'dashboard']);
    Route::get('/bookXchange/logout',[UserController::class, 'logout']);
    Route::get('/bookXchange/addbook', [BookController::class, 'addbook']);
    Route::get('/bookXchange/myaccount', [UserController::class, 'myaccount']);
    //Route for adding new books.
    Route::post('/bookXchange/getAddBook', [BookController::class, 'getAddBook'])->name('BookController.getAddBook');
    //Route for my books.
    Route::get('/bookXchange/myaccount/mybook', [BookController::class, 'getMyBook']);
    //Route for update account detail
    Route::post('/bookXchange/myaccount/getMyAccountUpdate', [UserController::class, 'getMyAccountUpdate'])->name('BookController.getMyAccountUpdate');
    //Route Password
    Route::post('/bookXchange/myaccount/updatePassword', [UserController::class, 'updatePassword'])->name('UserController.updatePassword');
    //Route lending history
    Route::get('/bookXchange/myaccount/lendingHistory', [BookController::class, 'lendingHistory']);
    //Route lending borrows
    Route::get('/bookXchange/myaccount/borrows', [BookController::class, 'borrows']);
    //Route wish list
    Route::get('/bookXchange/myaccount/wishlist', [BookController::class, 'wishlist']);
    //Route delete wishlist
    Route::get('/bookXchange/dashboard/myaccount/deletewishlist/{id}', [BookController::class, 'getDeleteWishList']);
    //Route book request
    Route::get('/bookXchange/bookrequest', [BookController::class, 'bookRequest']);
    //Route view book
    Route::get('bookXchange/dashboard/viewbook/{id}', [BookController::class, 'viewBook']);
    //Book review from home page
    Route::get('bookXchange/dashboard/viewbook/bookreview/{id}', [BookController::class, 'bookreview']);
    //search book
    Route::get('/bookXchange/dashboard/searchbook', [BookController::class, 'searchBook'])->name('BookController.searchbook');
    //view edit book
    Route::get('/bookXchange/dashboard/myaccount/editbook/{id}', [BookController::class, 'getEditBook']);
    //get edit book
    Route::post('/bookXchange/dashboard/myaccount/updateeditbook', [BookController::class, 'updateEditBook'])->name('BookController.updateeditbook');
    //reject book request
    Route::post('/bookXchange/dashboard/rejectrequest', [BookController::class, 'getRejectRequest'])->name('BookController.requestreject');
    //insertUserRating
    Route::post('/bookXchange/dashboard/userrating', [BookController::class, 'insertUserRating'])->name('BookController.userrating');
    //grant request
    Route::post('/bookXchange/dashboard/bookrequestgrant', [BookController::class, 'updateGrantRequest'])->name('BookController.grantrequest');
});