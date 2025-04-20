<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center text-indigo-600">Welcome to the Recipe Sharing Platform</h1>
    
    <div class="mt-8">
        <h3 class="text-2xl font-semibold text-gray-800">Latest Recipes</h3>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach($recipes as $recipe)
            <div class="card bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <!-- Recipe Image -->
                <img src="{{ asset('storage/' . $recipe->image) }}" class="w-full h-56 object-cover" alt="{{ $recipe->title }}">

                <!-- Card Body -->
                <div class="p-4">
                    <h5 class="text-xl font-semibold text-gray-800 truncate">{{ $recipe->title }}</h5>
                    <p class="text-gray-600 text-sm mt-2 truncate">{{ $recipe->description }}</p>
                    
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('recipes.show', $recipe) }}" class="text-white bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-lg text-sm font-semibold transition duration-300">
                            View Recipe
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
