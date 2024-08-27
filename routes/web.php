<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\MainController ;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

route::get('/' , [HomeController::class, 'index'])->middleware('AccessControlByUserType')->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home' , function(){
})->name('home')->middleware('CheckUserType' );

route::group(['middleware' => ['auth:sanctum' , 'AccessControlByUserType' ]], function () {
    route::get('front-home' , [HomeController::class, 'index'])->name('front.index');
    route::get('admin-home' , [MainController::class, 'index'])->name('admin.index');
});

    route::group(['middleware' => ['auth:sanctum' , 'AccessControlByUserType']], function () {
        route::get('borrow_book/{book}', [HomeController::class, 'borrowBook'])->name('borrow_book');
        route::get('book_history', [HomeController::class, 'bookHistory'])->name('book_history');
        route::get('cancel_request/{borrow}', [HomeController::class, 'cancelRequest'])->name('cancel_request');
    });

    route::group(['middleware' => ['AccessControlByUserType' ]], function () {
        route::get('explored_books', [HomeController::class, 'exploredBooks'])->name('explore');
        route::get('book_details/{book}', [HomeController::class, 'bookDetails'])->name('book_details');
    });

route::group(['middleware' => ['auth:sanctum' ,'AccessControlByUserType'  ]], function () {
   route::resource('categories', CategoryController::class);
   route::resource('books', BookController::class);
   route::resource('user' , AdminController::class );
   route::resource('student' , StudentController::class );
   route::get('borrow_request' , [bookController::class, 'borrowRequest'])->name('borrow_request');
    route::get('approve_borrow/{borrow}' , [bookController::class, 'approveBorrow'])->name('approve_borrow');
    route::get('reject_borrow/{borrow}' , [bookController::class, 'rejectBorrow'])->name('reject_borrow');
    route::get('return_book/{borrow}' , [bookController::class, 'returnBook'])->name('return_book');
});



