<?php $__env->startSection('title'); ?>
    Student | login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <h1 class="text-info text-center mt-5">Student Login</h1>
    
    <?php if(session()->has('alreadyUser')): ?>
        <div class="alert alert-warning my-5 text-center">You are already User, login please</div>
        <?php echo session()->forget('alreadyUser'); ?>

    <?php endif; ?>
    <p class=" container">Login as, <a class="text-primary" href="<?php echo e(route('instructor.log')); ?>">Instructor ?</a></p>
    <form action="<?php echo e(route('student.doLog')); ?>" class="container my-5" method="post">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>">
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger text-center my-3"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger text-center my-3"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <p class=" container">Not user, <a class="text-primary" href="<?php echo e(route('student.register')); ?>">Register ?</a></p>
        <button class="btn btn-primary" type="submit">Log In</button>
        <a class="btn btn-primary" href="<?php echo e(route('student.socialLog','facebook')); ?>">Log In with facebook</a>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front/layout/frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/student/log.blade.php ENDPATH**/ ?>