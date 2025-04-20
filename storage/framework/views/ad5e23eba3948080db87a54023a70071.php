
<div class="container">
    <h1>Welcome to the Recipe Sharing Platform</h1>
    <div class="mt-4">
        <h3>Latest Recipes</h3>
        <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
            <img src="<?php echo e(asset('storage/' . $recipe->image)); ?>" class="card-img-top" alt="<?php echo e($recipe->title); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($recipe->title); ?></h5>
                <p class="card-text"><?php echo e($recipe->description); ?></p>
                <a href="<?php echo e(route('recipes.show', $recipe)); ?>" class="btn btn-info">View Recipe</a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php /**PATH C:\Users\Nishant Kumar\OneDrive\Desktop\LaravelPro\recipe_maker\resources\views/welcome.blade.php ENDPATH**/ ?>