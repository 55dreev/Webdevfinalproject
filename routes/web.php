<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;

// Route to show the create ticket form
Route::get('/create-ticket', [TicketController::class, 'create'])->name('create-ticket');

// Route to handle form submission (store the ticket)
Route::post('/store-ticket', [TicketController::class, 'store'])->name('store-ticket');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Separate POST routes for user and admin logins
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.submit');
Route::post('/admin-login', [AuthController::class, 'loginAdmin'])->name('admin.login');

// **Logout route updated to POST**
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User and Admin-specific routes
Route::get('/create-ticket', function () {
    if (session('user_type') === 'user') {
        return view('create-ticket');
    }
    return redirect()->route('login');
})->name('create-ticket');

Route::get('/view-ticket', function () {
    if (session('user_type') === 'admin') {
        return view('view-ticket');
    }
    return redirect()->route('login');
})->name('view-ticket');
