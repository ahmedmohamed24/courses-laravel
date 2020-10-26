<?php $__env->startSection('title'); ?>
    Admin | add new admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        form{
            min-height:60vh;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if(session()->has('isAdminAdded')): ?>
        <?php session()->forget('isAdminAdded'); ?>
        <div class="alet alert-success my-4 container text-center p-4">Admin Added successfully</div>
    <?php endif; ?>
    <?php echo $__env->make('admin/inc/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <h1 class="text-center text-info my-5">Add new admin</h1>
    <form class="my-5 container" method="POST" action="<?php echo e(route('admin.save')); ?>">
        <?php echo csrf_field(); ?>

        <div class="form-group">
            <label for="name" class="text-primary">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>">
        </div>
        <div class="form-group">
            <label for="email" class="text-primary">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>">
        </div>
        <div class="form-group">
            <label for="password" class="text-primary">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Add</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/admin/newAdmin.blade.php ENDPATH**/ ?>