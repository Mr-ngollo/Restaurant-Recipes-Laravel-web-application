<?php

use App\Livewire\AdminDashoard;
use Illuminate\Support\Facades\Route;
use App\Livewire\RecipeDetails;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin/dashboard', AdminDashoard::class)->middleware('admin');

Route::get('/recipe/details', RecipeDetails::class);
