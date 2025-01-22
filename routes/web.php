<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RecipeDetails;

Route::get('/', function () {
    return view('home');
});

Route::get('/recipe/details', RecipeDetails::class);
