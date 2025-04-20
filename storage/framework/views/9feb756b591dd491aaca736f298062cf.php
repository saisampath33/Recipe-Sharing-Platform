
<div class="container mt-4">
    <h2 class="mb-4">👋 Welcome, <?php echo e(Auth::user()->name); ?>!</h2>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="mb-3">
        <a href="<?php echo e(route('recipes.create')); ?>" class="btn btn-primary">+ Add New Recipe</a>
    </div>

    <h4 class="mt-4">📋 Your Recipes</h4>

    <?php if($recipes->count()): ?>
        <div class="list-group mt-2">
            <?php $__currentLoopData = $recipes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recipe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('recipes.show', $recipe->id)); ?>" class="list-group-item list-group-item-action">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong><?php echo e($recipe->title); ?></strong> <br>
                            <small><?php echo e($recipe->cuisine_type); ?> | <?php echo e($recipe->difficulty_level); ?></small>
                        </div>
                        <span class="text-muted"><?php echo e($recipe->created_at->diffForHumans()); ?></span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-3">
            <?php echo e($recipes->links()); ?> 
        </div>
    <?php else: ?>
        <p class="text-muted mt-3">You haven't added any recipes yet.</p>
    <?php endif; ?>
</div>

<?php /**PATH C:\Users\Nishant Kumar\OneDrive\Desktop\LaravelPro\recipe_maker\resources\views/dashboard.blade.php ENDPATH**/ ?>