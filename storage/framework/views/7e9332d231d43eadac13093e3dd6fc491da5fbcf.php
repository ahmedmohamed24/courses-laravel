<?php $__env->startSection('style'); ?>
    <style>
        form{
            min-height: 60vh;
        }

    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Category | create
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session()->has('isUploaded')): ?>
    <?php session()->forget('isUploaded') ?>
    <div class="text-center alert alert-success my-4">Category created successfully</div>
<?php endif; ?>
<?php echo $__env->make('admin/inc/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route('admin.saveCategory')); ?>" method="POST" class=" my-5 container" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name" class="text-primary">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" >
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="uploadInput">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="in-1" name="img" aria-describedby="uploadInput">
              <label class="custom-file-label" for="in-1">Category Image</label>
            </div>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/admin/createCat.blade.php ENDPATH**/ ?>