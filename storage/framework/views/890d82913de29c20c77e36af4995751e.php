<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($recipe->title); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('https://www.transparenttextures.com/patterns/food.png');
            background-size: 300px;
        }
        .glass {
            backdrop-filter: blur(12px);
            background: rgba(255, 255, 255, 0.75);
        }
    </style>
</head>
<body class="bg-gradient-to-r from-yellow-100 via-pink-100 to-purple-100 min-h-screen">

    <?php echo $__env->make("navbar", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="container mx-auto px-4 py-10 max-w-5xl">
        <div class="glass p-8 rounded-2xl shadow-2xl">
            <h1 class="text-5xl font-extrabold text-center text-purple-700 mb-8"><?php echo e($recipe->title); ?></h1>

            <?php if(Auth::check() && Auth::user()->id == $recipe->user_id): ?>
            <div class="flex justify-end space-x-3 mb-6">
                <a href="<?php echo e(route('recipes.edit', $recipe)); ?>" class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-300">
                    ✏️ Edit
                </a>

                <form action="<?php echo e(route('recipes.destroy', $recipe)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow transition duration-300">
                        🗑️ Delete
                    </button>
                </form>
            </div>
            <?php endif; ?>

            <div class="mb-8">
                <img src="<?php echo e(asset('storage/' . $recipe->image)); ?>" alt="<?php echo e($recipe->title); ?>"
                    class="w-full h-72 object-cover rounded-xl shadow-lg transition-transform transform hover:scale-105 duration-300">
            </div>

            <div class="grid md:grid-cols-2 gap-6 text-gray-800">
                <div>
                    <h2 class="text-2xl font-semibold text-pink-600 mb-2">📖 Description</h2>
                    <p class="bg-white/70 p-3 rounded-lg shadow"><?php echo e($recipe->description); ?></p>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-pink-600 mb-2">🧂 Ingredients</h2>
                    <p class="bg-white/70 p-3 rounded-lg shadow"><?php echo e($recipe->ingredients); ?></p>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-pink-600 mb-2">🎯 Difficulty</h2>
                    <p class="bg-white/70 p-3 rounded-lg shadow"><?php echo e($recipe->difficulty); ?></p>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold text-pink-600 mb-2">🌍 Cuisine Type</h2>
                    <p class="bg-white/70 p-3 rounded-lg shadow"><?php echo e($recipe->cuisine); ?></p>
                </div>
            </div>

            <hr class="my-10 border-gray-300">

            <h2 class="text-3xl font-bold text-purple-800 mb-4">⭐ Ratings & Reviews</h2>

            <?php if($recipe->ratings->count()): ?>
                <?php $__currentLoopData = $recipe->ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white/80 border border-gray-200 p-4 mb-4 rounded-lg shadow-md">
                    <div class="flex items-center justify-between">
                        <p class="text-lg font-semibold text-gray-800"><?php echo e($rating->user->name); ?></p>
                        <span class="text-yellow-500 text-xl">
                            <?php echo e(str_repeat('★', $rating->rating)); ?><?php echo e(str_repeat('☆', 5 - $rating->rating)); ?>

                        </span>
                    </div>
                    <small class="text-gray-500"><?php echo e($rating->created_at->diffForHumans()); ?></small>
                    <p class="mt-2 text-gray-700"><?php echo e($rating->review); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <p class="text-gray-500 italic">No ratings yet. Be the first to review! 🌟</p>
            <?php endif; ?>

            <hr class="my-10 border-gray-300">

            <h2 class="text-3xl font-bold text-purple-800 mb-4">📝 Rate and Review</h2>
            <form action="<?php echo e(route('ratings.store', $recipe)); ?>" method="POST" class="space-y-6">
                <?php echo csrf_field(); ?>
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700">Choose Rating</label>
                    <select name="rating" id="rating"
                            class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500">
                        <option value="1">⭐ 1</option>
                        <option value="2">⭐⭐ 2</option>
                        <option value="3">⭐⭐⭐ 3</option>
                        <option value="4">⭐⭐⭐⭐ 4</option>
                        <option value="5">⭐⭐⭐⭐⭐ 5</option>
                    </select>
                </div>

                <div>
                    <label for="review" class="block text-sm font-medium text-gray-700">Your Review</label>
                    <textarea name="review" id="review" rows="4"
                        class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:ring-pink-500 focus:border-pink-500"></textarea>
                </div>

                <button type="submit"
                        class="bg-gradient-to-r from-indigo-500 to-pink-500 text-white font-semibold py-2 px-6 rounded-md hover:from-indigo-600 hover:to-pink-600 transition duration-300">
                    ✍️ Submit Review
                </button>
            </form>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\Users\Nishant Kumar\OneDrive\Desktop\LaravelPro\recipe_maker\resources\views/recipes/show.blade.php ENDPATH**/ ?>