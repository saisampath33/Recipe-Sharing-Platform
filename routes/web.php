<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

// 🔓 Public Routes

// 🔐 Authentication Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('isAuthenticated')->group(function () {
    
    Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes.index');
    Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
    Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
    Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
    Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update');
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
   
    
    // 🍳 Recipe CRUD (Except 'show' which is public)

    
    // ⭐ Ratings
    Route::get('/recipes/{recipe}/rate', [RatingController::class, 'create'])->name('ratings.create');
    Route::post('/recipes/{recipe}/rate', [RatingController::class, 'store'])->name('ratings.store');
});
Route::get('/recipes/{recipe}', [RecipeController::class, 'show'])->name('recipes.show');
