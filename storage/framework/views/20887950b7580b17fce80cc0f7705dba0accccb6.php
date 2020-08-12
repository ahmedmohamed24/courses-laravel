<?php $__env->startSection('style'); ?>
    <style>
        form{
            min-height: 60vh;
        }

    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Category | Edit
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(session()->has('isUpdated')): ?>
    <?php session()->forget('isUpdated') ?>
    <div class="text-center alert alert-success my-4">Category Updated successfully</div>
<?php endif; ?>
<?php echo $__env->make('admin/inc/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <form action="<?php echo e(route('admin.catUpdate')); ?>" method="POST" class=" my-5 container" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <input type="text" name="name" class="form-control" required id="name" value="<?php echo e($category->name); ?>">
        </div>
        <img src="<?php echo e(asset("uploads/categories/$category->img")); ?>" alt="<?php echo e($category->name); ?>" class="img-fluid">
        <div class="input-group m-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="uploadInput">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="in-1" name="img" aria-describedby="uploadInput">
              <label class="custom-file-label" for="in-1">Category Image</label>
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/admin/catEdit.blade.php ENDPATH**/ ?>