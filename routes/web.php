<?php

use App\Livewire\ManageEnquiry;
use App\Livewire\AddCategory;
use App\Livewire\AddRecipeForm;
use App\Livewire\AdminDashoard;
use App\Livewire\AdminReviewsTable;
use App\Livewire\AllRecipies;
use App\Livewire\Contacts;
use App\Livewire\EditRecipe;
use App\Livewire\ManageCategory;
use App\Livewire\ManageOrders;
use App\Livewire\ManageRecipe;
use App\Livewire\ManageUser;
use Illuminate\Support\Facades\Route;
use App\Livewire\RecipeDetails;
use App\Livewire\RecipeReviews;

Route::get('/', function () {
    return view('home');
});

Route::get('/recipe/{recipe_id}/details', RecipeDetails::class);

Route::get('/recipes/{id}/reviews', RecipeReviews::class)->name('recipes.reviews');

Route::get('/all/recipes',AllRecipies::class);
Route::get('/contacts',Contacts::class);

Route::get('/cookie-policy', function () {
    return view('cookie-policy');
})->name('cookie.policy');

Route::get('/recipe/details', RecipeDetails::class);

Route::group(["middleware" => "admin"], function () {
        Route::get('/admin/dashboard', AdminDashoard::class)->name('dasboard');

        Route::get('/recipes', ManageRecipe::class)->name('recipes');

        Route::get('/reviews', AdminReviewsTable::class)->name('reviews');

        Route::get('/orders', ManageOrders::class)->name('orders');

        Route::get('/users', ManageUser::class)->name('users');

        Route::get('/enquiries', ManageEnquiry::class)->name('enquiries');

        Route::get('/manage/categories', ManageCategory::class)->name('categories');

        Route::get('/add/recipe', AddRecipeForm::class);

        Route::get('/add/category', AddCategory::class);

        Route::get('/edit/{id}/recipe', EditRecipe::class);
    });
