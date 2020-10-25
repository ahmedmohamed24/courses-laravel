<?php $__env->startSection('title'); ?>
    Instructor | login
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <h1 class="text-info text-center">Instructor Login</h1>

    <?php if(session()->has('isNotWaited')): ?>
        <?php echo e(session()->forget('isNotWaited')); ?>

        <div class="alert alert-danger text-center container">Please visite your email or wait 10 minutes to resend</div>
    <?php endif; ?>

    <p class=" container">Log in as, <a class="text-primary" href="<?php echo e(route('student.log')); ?>">Student ?</a></p>
    <form action="<?php echo e(route('instructor.doLog')); ?>" class="container my-5" method="post">
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
            <?php if(session()->has('isPassWrong')): ?>
                <?php session()->forget('isPassWrong') ?>
                <div class="text-center alert alert-danger my-4">Wrong Password</div>
            <?php endif; ?>
        </div>
        <p class=" container">Not User, <a class="text-primary" href="<?php echo e(route('instructor.register')); ?>">Register ?</a></p>
        <button class="btn btn-primary" type="submit">Log In</button>
        <p class="my-4">Forget password? <a class="text-primary" href="<?php echo e(route('instructor.resetPass')); ?>">CLick here</a></p>
    </form>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front/layout/frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/instructor/log.blade.php ENDPATH**/ ?>