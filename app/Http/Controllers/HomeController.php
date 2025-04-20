<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the welcome page with some featured recipes.
     *
     * @return \Illuminate\View\View
     */
    public function welcome()
    {
        // Fetch a few featured or popular recipes (adjust as needed)
        $featuredRecipes = Recipe::latest()->take(3)->get();  // Adjust the count as needed

        return view('welcome', compact('featuredRecipes'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch a list of all recipes, possibly with sorting or pagination
        $recipes = Recipe::latest()->paginate(10);  // Adjust pagination as needed

        return view('dashboard', compact('recipes'));
    }
}
