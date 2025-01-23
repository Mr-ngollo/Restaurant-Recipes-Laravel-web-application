<?php
namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    // Show all ingredients
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('ingredients.index', compact('ingredients'));
    }

    // Show a form to create a new ingredient
    public function create()
    {
        return view('ingredients.create');
    }

    // Store a new ingredient in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Ingredient::create($request->only(['name', 'description']));
        return redirect()->route('ingredients.index');
    }

    // Show a form to edit an ingredient
    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('ingredients.edit', compact('ingredient'));
    }

    // Update an ingredient in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update($request->only(['name', 'description']));
        return redirect()->route('ingredients.index');
    }

    // Delete an ingredient from the database
    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return redirect()->route('ingredients.index');
    }
}
