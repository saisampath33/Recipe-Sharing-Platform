@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Rate and Review Recipe: {{ $recipe->title }}</h1>

    <!-- Rating Form -->
    <form action="{{ route('ratings.store', $recipe) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <select class="form-select" name="rating" id="rating" required>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="review" class="form-label">Review</label>
            <textarea class="form-control" name="review" id="review" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>
</div>
@endsection
