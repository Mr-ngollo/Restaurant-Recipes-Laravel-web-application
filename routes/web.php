<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Livewire\RecipeDetails;

Route::get('/', function () {
    return view('home');
});

Route::resource('recipes', RecipeController::class);
Route::resource('ingredients', IngredientController::class);
Route::resource('categories', CategoryController::class);

Route::get('recipes/{recipe}/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('recipes/{recipe}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::delete('reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

Route::get('/recipe/details', RecipeDetails::class);
