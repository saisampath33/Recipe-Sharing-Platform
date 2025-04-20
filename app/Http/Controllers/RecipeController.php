<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
    // Display all recipes
    public function index()
    {
        $recipes = Recipe::latest()->get(); // You can modify this for sorting later
        return view('recipes.index', compact('recipes'));
    }

    // Show form to create a new recipe
    public function create()
    {
        return view('recipes.create');
    }

    // Store a new recipe
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'difficulty' => 'required|string|in:Easy,Medium,Hard',
            'cuisine' => 'required|string',  // This matches the DB column 'cuisine'
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new recipe and assign the validated data
        $recipe = new Recipe();
        $recipe->user_id = Auth::id();  // Ensure user is logged in
        $recipe->title = $validated['title'];
        $recipe->description = $validated['description'];
        $recipe->ingredients = $validated['ingredients'];
        $recipe->difficulty = $validated['difficulty'];
        $recipe->cuisine = $validated['cuisine'];

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Store image and save the path in the database
            $imagePath = $request->file('image')->store('recipes', 'public');
            $recipe->image = $imagePath;
        }

        // Save the recipe in the database
        $recipe->save();

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
    }

    // Show a single recipe
    public function show(Recipe $recipe)
    {
        $averageRating = $recipe->ratings()->avg('rating'); // average nikala

        return view('recipes.show', compact('recipe', 'averageRating'));
    }

    // Show form to edit a recipe
    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    // Update a recipe
    public function update(Request $request, Recipe $recipe)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'difficulty' => 'required|string|in:Easy,Medium,Hard',
            'cuisine' => 'required|string', // Ensure this matches DB column 'cuisine'
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update recipe data
        $recipe->title = $validated['title'];
        $recipe->description = $validated['description'];
        $recipe->ingredients = $validated['ingredients'];
        $recipe->difficulty = $validated['difficulty'];
        $recipe->cuisine = $validated['cuisine'];

        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // If a new image is uploaded, delete the old one
            if ($recipe->image) {
                Storage::delete('public/' . $recipe->image);
            }

            // Store the new image and save the path
            $imagePath = $request->file('image')->store('recipes', 'public');
            $recipe->image = $imagePath;
        }

        // Save the updated recipe
        $recipe->save();

        return redirect()->route('recipes.index')->with('success', 'Recipe updated successfully!');
    }

    // Delete a recipe
    public function destroy(Recipe $recipe)
    {
        // Delete the associated image from storage if exists
        if ($recipe->image) {
            Storage::delete('public/' . $recipe->image);
        }

        // Delete the recipe record from the database
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully!');
    }
}
