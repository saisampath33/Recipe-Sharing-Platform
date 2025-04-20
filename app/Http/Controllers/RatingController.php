<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    // Store or update a rating and review
    public function store(Request $request, Recipe $recipe)
    {
        // Validate the request data
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string',
        ]);

        // Check if the user has already rated this recipe
        $rating = Rating::where('user_id', Auth::id())
                        ->where('recipe_id', $recipe->id)
                        ->first();

        if ($rating) {
            // If a rating already exists, update it
            $rating->rating = $request->rating;
            $rating->review = $request->review;
            $rating->save();

            return back()->with('success', 'Your rating and review have been updated!');
        } else {
            // If no rating exists, create a new one
            $rating = new Rating();
            $rating->user_id = Auth::id();
            $rating->recipe_id = $recipe->id;
            $rating->rating = $request->rating;
            $rating->review = $request->review;
            $rating->save();

            return back()->with('success', 'Your rating and review have been submitted!');
        }
    }
}
