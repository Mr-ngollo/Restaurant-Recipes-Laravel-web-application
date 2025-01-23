<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    // Show all recipes
    public function index()
    {
        $recipes = Recipe::with('category', 'ingredients', 'tags')->get();
        return view('recipes.index', compact('recipes'));
    }

    // Show a specific recipe with its ingredients and tags
    public function show($id)
    {
        $recipe = Recipe::with('ingredients', 'category', 'tags', 'reviews')->findOrFail($id);
        return view('recipes.show', compact('recipe'));
    }

    // Show the form to create a new recipe
    public function create()
    {
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return view('recipes.create', compact('categories', 'ingredients'));
    }

    // Store a new recipe in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'ingredient_ids' => 'required|array',
            'quantities' => 'required|array',
            'units' => 'required|array',
        ]);

        // Create the recipe
        $recipe = Recipe::create($request->only(['name', 'description', 'instructions', 'category_id']));

        // Attach ingredients with quantity and unit
        foreach ($request->ingredient_ids as $index => $ingredient_id) {
            $recipe->ingredients()->attach($ingredient_id, [
                'quantity' => $request->quantities[$index],
                'unit' => $request->units[$index],
            ]);
        }

        return redirect()->route('recipes.index');
    }

    // Show the form to edit a recipe
    public function edit($id)
    {
        $recipe = Recipe::with('ingredients')->findOrFail($id);
        $categories = Category::all();
        $ingredients = Ingredient::all();
        return view('recipes.edit', compact('recipe', 'categories', 'ingredients'));
    }

    // Update a recipe in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'ingredient_ids' => 'required|array',
            'quantities' => 'required|array',
            'units' => 'required|array',
        ]);

        $recipe = Recipe::findOrFail($id);
        $recipe->update($request->only(['name', 'description', 'instructions', 'category_id']));

        // Sync ingredients with updated quantities and units
        $recipe->ingredients()->detach();
        foreach ($request->ingredient_ids as $index => $ingredient_id) {
            $recipe->ingredients()->attach($ingredient_id, [
                'quantity' => $request->quantities[$index],
                'unit' => $request->units[$index],
            ]);
        }

        return redirect()->route('recipes.index');
    }

    // Delete a recipe from the database
    public function destroy($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->delete();
        return redirect()->route('recipes.index');
    }
}

