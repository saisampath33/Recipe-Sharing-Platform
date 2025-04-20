<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body::before {
            content: '';
            background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092'); /* Example food image */
            background-size: cover;
            background-position: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0.15; /* Soft effect */
            z-index: -1;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-indigo-100 to-blue-100 min-h-screen">

    <?php echo $__env->make("navbar", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="container mx-auto px-4 py-10">
        <h1 class="text-4xl font-bold text-center text-indigo-700 mb-10 drop-shadow">Edit Your Delicious Recipe</h1>

        <form action="<?php echo e(route('recipes.update', $recipe)); ?>" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-xl backdrop-blur-md bg-opacity-90">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Recipe Title -->
            <div class="mb-6">
                <label for="title" class="block text-lg font-medium text-gray-700">Recipe Title</label>
                <input type="text" id="title" name="title" value="<?php echo e($recipe->title); ?>"
                       class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="4"
                          class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                          required><?php echo e($recipe->description); ?></textarea>
            </div>

            <!-- Ingredients -->
            <div class="mb-6">
                <label for="ingredients" class="block text-lg font-medium text-gray-700">Ingredients</label>
                <textarea id="ingredients" name="ingredients" rows="4"
                          class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                          required><?php echo e($recipe->ingredients); ?></textarea>
            </div>

            <!-- Difficulty -->
            <div class="mb-6">
                <label for="difficulty" class="block text-lg font-medium text-gray-700">Difficulty Level</label>
                <select id="difficulty" name="difficulty"
                        class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-300 bg-white focus:ring-2 focus:ring-indigo-400 focus:outline-none"
                        required>
                    <option value="Easy" <?php echo e($recipe->difficulty == 'Easy' ? 'selected' : ''); ?>>Easy</option>
                    <option value="Medium" <?php echo e($recipe->difficulty == 'Medium' ? 'selected' : ''); ?>>Medium</option>
                    <option value="Hard" <?php echo e($recipe->difficulty == 'Hard' ? 'selected' : ''); ?>>Hard</option>
                </select>
            </div>

            <!-- Cuisine -->
            <div class="mb-6">
                <label for="cuisine_type" class="block text-lg font-medium text-gray-700">Cuisine Type</label>
                <input type="text" id="cuisine_type" name="cuisine" value="<?php echo e($recipe->cuisine); ?>"
                       class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:outline-none" required>
            </div>

            <!-- Image Upload -->
            <div class="mb-6">
                <label for="image" class="block text-lg font-medium text-gray-700">Recipe Image</label>
                <input type="file" id="image" name="image" accept="image/*"
                       class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-400 focus:outline-none">

                <?php if($recipe->image): ?>
                <div class="mt-4">
                    <img src="<?php echo e(asset('storage/' . $recipe->image)); ?>" alt="Recipe Image" class="rounded-lg shadow-md w-40 h-40 object-cover">
                </div>
                <?php endif; ?>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white text-lg font-semibold px-6 py-3 rounded-lg shadow-md transition duration-300">
                    Update Recipe
                </button>
            </div>
        </form>
    </div>

</body>
</html>
<?php /**PATH C:\Users\Nishant Kumar\OneDrive\Desktop\LaravelPro\recipe_maker\resources\views/recipes/edit.blade.php ENDPATH**/ ?>