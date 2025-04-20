<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Recipe</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <!-- Custom Tailwind Config for Fonts -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Pacifico', 'cursive'],
                        body: ['Roboto', 'sans-serif'],
                    },
                    backgroundImage: {
                        'recipe-bg': "url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80')"
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-recipe-bg bg-cover bg-center min-h-screen font-body text-gray-800">

    @include("navbar")

    <div class="backdrop-blur-sm bg-white/80 max-w-3xl mx-auto mt-12 p-8 rounded-xl shadow-xl">
        <h1 class="text-4xl font-heading text-center text-blue-700 mb-8">Create Your Delicious Recipe</h1>

        <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-semibold text-gray-700">Recipe Title</label>
                <input type="text" name="title" id="title" required
                       class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-gray-700">Recipe Description</label>
                <textarea name="description" id="description" rows="3" required
                          class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
            </div>

            <div>
                <label for="ingredients" class="block text-sm font-semibold text-gray-700">Ingredients</label>
                <textarea name="ingredients" id="ingredients" rows="3" required
                          class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
            </div>

            <div>
                <label for="difficulty" class="block text-sm font-semibold text-gray-700">Difficulty Level</label>
                <select name="difficulty" id="difficulty" required
                        class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    <option value="">-- Select Difficulty --</option>
                    <option value="Easy">Easy</option>
                    <option value="Medium">Medium</option>
                    <option value="Hard">Hard</option>
                </select>
            </div>

            <div>
                <label for="cuisine_type" class="block text-sm font-semibold text-gray-700">Cuisine Type</label>
                <input type="text" name="cuisine" id="cuisine_type" required
                       class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label for="image" class="block text-sm font-semibold text-gray-700">Recipe Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="mt-1 w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none">
            </div>

            <div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg font-semibold text-lg hover:bg-blue-700 transition shadow-md">
                    🍽️ Submit Recipe
                </button>
            </div>
        </form>
    </div>

</body>
</html>
