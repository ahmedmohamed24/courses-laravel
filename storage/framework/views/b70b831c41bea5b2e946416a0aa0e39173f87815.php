

<?php if($errors->any()): ?>
    <div class="alert alert-danger my-5">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/admin/inc/error.blade.php ENDPATH**/ ?>