<?php

use App\Livewire\AddCategory;
use App\Livewire\AddRecipeForm;
use App\Livewire\AdminDashoard;
use App\Livewire\EditRecipe;
use App\Livewire\ManageCategory;
use App\Livewire\ManageOrders;
use App\Livewire\ManageRecipe;
use App\Livewire\ManageUser;
use Illuminate\Support\Facades\Route;
use App\Livewire\RecipeDetails;

Route::get('/', function () {
    return view('home');
});

Route::get('/recipe/details', RecipeDetails::class);

Route::
group(["middleware" => "admin"], function () {
    Route::get('/admin/dashboard', AdminDashoard::class)->name('dasboard');

    Route::get('/recipes', ManageRecipe::class)->name('recipes');

    Route::get('/orders', ManageOrders::class)->name('orders');

    Route::get('/users', ManageUser::class)->name('users');

    Route::get('/manage/categories', ManageCategory::class)->name('categories');

    Route::get('/add/recipe', AddRecipeForm::class);

    Route::get('/add/category', AddCategory::class);

    Route::get('/edit/{id}/recipe', EditRecipe::class);
});
