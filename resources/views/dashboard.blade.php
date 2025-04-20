
<div class="container mt-4">
    <h2 class="mb-4">👋 Welcome, {{ Auth::user()->name }}!</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a href="{{ route('recipes.create') }}" class="btn btn-primary">+ Add New Recipe</a>
    </div>

    <h4 class="mt-4">📋 Your Recipes</h4>

    @if($recipes->count())
        <div class="list-group mt-2">
            @foreach($recipes as $recipe)
                <a href="{{ route('recipes.show', $recipe->id) }}" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>{{ $recipe->title }}</strong> <br>
                            <small>{{ $recipe->cuisine_type }} | {{ $recipe->difficulty_level }}</small>
                        </div>
                        <span class="text-muted">{{ $recipe->created_at->diffForHumans() }}</span>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-3">
            {{ $recipes->links() }} {{-- Pagination links --}}
        </div>
    @else
        <p class="text-muted mt-3">You haven't added any recipes yet.</p>
    @endif
</div>

