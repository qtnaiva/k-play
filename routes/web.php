<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdolController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Main
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Idols & Groups
Route::get('/idols', [IdolController::class, 'index'])->name('idols.index');
Route::get('/idols/{id}', [IdolController::class, 'show'])->name('idols.show');
Route::get('/groups', [IdolController::class, 'groups'])->name('groups.index');

// Community
Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
Route::get('/community/{id}', [CommunityController::class, 'show'])->name('community.show');
Route::post('/community', [CommunityController::class, 'store'])->name('community.store');

// News & Comeback
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/calendar', [NewsController::class, 'calendar'])->name('news.calendar');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/bias', [ProfileController::class, 'bias'])->name('profile.bias');
Route::get('/profile/groups', [ProfileController::class, 'groups'])->name('profile.groups');
Route::get('/profile/playlist', [ProfileController::class, 'playlist'])->name('profile.playlist');
Route::get('/profile/notifications', [ProfileController::class, 'notifications'])->name('profile.notifications');