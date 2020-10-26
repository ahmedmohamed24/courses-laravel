<?php $__env->startSection('title'); ?>
    istructor | reset password
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('instructor.savePassword')); ?>" method="post" class="container my-5">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="password" class="text-primary">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger my-3 text-center"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="password-c" class="text-primary">Confirm Password</label>
            <input type="password" class="form-control" id="password-c"  name="password-c">
            <?php $__errorArgs = ['password-c'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger my-3 text-center"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit" class="btn btn-warning">Reset</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/instructor/createPass.blade.php ENDPATH**/ ?>