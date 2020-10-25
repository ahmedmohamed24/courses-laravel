<?php $__env->startSection('title'); ?>
    Admin | settings
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>

    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if(session()->has('isUpdated')): ?>
        <?php session()->forget('isUpdated'); ?>
        <div class="alet alert-success my-4 container text-center p-4">Password updated successfully</div>
    <?php endif; ?>
    <?php if(session()->has('isNotUpdated')): ?>
        <?php session()->forget('isNotUpdated'); ?>
        <div class="alet alert-danger my-4 container text-center p-4">Enter a valid data, please</div>
    <?php endif; ?>
    <div class="container my-5">
        <h1 class="mb-2 text-info">Info: </h1>
        <h5 ><strong class="text-primary">Name: </strong><?php echo e(auth('admin')->user()->name); ?></h5>
        <h5 ><strong class="text-primary">Email: </strong><?php echo e(auth('admin')->user()->email); ?></h5>
    </div>
    <?php echo $__env->make('admin/inc/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container">
        <h2 class="text-info mb-4">Change Password: </h2>
        <form action="<?php echo e(route('admin.change')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <input type="password" name="password" class="form-control my-2" placeholder="old password">
            <input type="password" name="newPass" class="form-control my-2" placeholder="New password">
            <input type="password" name="ConfirmNewPass" class="form-control my-2" placeholder="confirm new password">
            <button class="btn btn-outline-warning  my-2"type="submit">Change</button>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/admin/settings.blade.php ENDPATH**/ ?>