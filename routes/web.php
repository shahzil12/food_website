<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController; 

// --- 1. PUBLIC ROUTES (Sabke liye open) ---

// 🔥 CHANGE: Pehle ye 'showLogin' tha, ab ye 'index' hai.
// Isse Guest user ko seedha Menu dikhega, Login nahi mangega.
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-post', [HomeController::class, 'contact_post'])->name('contact.post');
Route::get('/categories', [HomeController::class, 'categories'])->name('categories');

// Login aur Register ke liye alag routes banaye hain
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// --- 2. AUTHENTICATION LOGIC ---
Route::post('/login-post', [AuthController::class, 'login']);
Route::post('/register-post', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- 3. COMMON REDIRECT (Login ke baad yahan aate hain) ---
Route::get('/redirect', [HomeController::class, 'index']);


// --- 4. CUSTOMER ACTIONS ---
Route::get('/dashboard', [HomeController::class, 'index']); // Safety ke liye
Route::get('/show_cart', [HomeController::class, 'show_cart']);
Route::post('/add_cart', [HomeController::class, 'add_cart']);
Route::post('/remove_cart', [HomeController::class, 'remove_cart']);
Route::post('/confirm_order', [HomeController::class, 'confirm_order']);


// --- 5. ADMIN ROUTES ---
// Food
Route::get('/add_food', [AdminController::class, 'add_food_view']);
Route::get('/view_food', [AdminController::class, 'view_food']);
Route::post('/upload_food', [AdminController::class, 'upload_food']);
Route::post('/edit_food', [AdminController::class, 'edit_food']);     
Route::post('/update_food', [AdminController::class, 'update_food']); 
Route::post('/delete_food', [AdminController::class, 'delete_food']);

// Orders (Admin)
Route::get('/orders', [AdminController::class, 'orders']);
Route::post('/assign_order', [AdminController::class, 'assign_order']); // Admin Assign karega
Route::post('/delivered', [AdminController::class, 'delivered']); // (Optional: Agar admin deliver kare)

// Categories
Route::get('/view_category', [AdminController::class, 'view_category']);
Route::post('/add_category', [AdminController::class, 'add_category']);
Route::post('/delete_category', [AdminController::class, 'delete_category']);

// Messages
Route::get('/view_messages', [AdminController::class, 'view_messages']);


// --- 6. DELIVERY BOY ROUTES ---
Route::post('/complete_delivery', [HomeController::class, 'complete_delivery']);