<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Sharing Platform</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-image: url('https://images.unsplash.com/photo-1600891964599-f61ba0e24092'); /* change this URL to your desired one */
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            z-index: -1;
        }
    </style>
</head>
<body class="bg-gradient-to-r from-pink-100 via-yellow-100 to-green-100 min-h-screen">

    <?php echo $__env->make("navbar", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="container mx-auto px-4 py-10">
        <h1 class="text-5xl font-extrabold text-center text-indigo-800 drop-shadow mb-6">Welcome to the Recipe Sharing Platform</h1>
        
        <p class="text-center text-lg text-gray-700 mb-10 max-w-2xl mx-auto">Discover, cook, and share your favorite recipes with the world. Dive into delicious dishes crafted by food lovers just like you!</p>

        <div class="bg-white bg-opacity-80 backdrop-blur-md p-6 rounded-xl shadow-xl">
            <h3 class="text-3xl font-semibold mb-6 text-center text-teal-700">🍽️ Latest Recipes</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white/90 backdrop-blur-md shadow-xl rounded-2xl overflow-hidden transform hover:-translate-y-1 hover:shadow-2xl transition duration-300 border border-gray-200">
                    <img src="<?php echo e(asset('storage/' . $recipe->image)); ?>" class="w-full h-60 object-cover" alt="<?php echo e($recipe->title); ?>">
                    
                    <div class="p-5">
                        <h5 class="text-2xl font-bold text-gray-800"><?php echo e($recipe->title); ?></h5>
                        <p class="text-gray-600 mt-2 text-sm"><?php echo e(\Str::limit($recipe->description, 100)); ?></p>
                        
                        <a href="<?php echo e(route('recipes.show', $recipe)); ?>" class="mt-4 inline-block bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-medium py-2 px-5 rounded-lg hover:from-blue-600 hover:to-indigo-700 transition-all duration-300 shadow-md">
                            View Recipe
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\Users\Nishant Kumar\OneDrive\Desktop\LaravelPro\recipe_maker\resources\views/recipes/index.blade.php ENDPATH**/ ?>