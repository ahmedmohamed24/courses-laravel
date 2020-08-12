<?php $__env->startSection('title'); ?>
categories | Admin
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>

        .category{
            border:2px solid #c1c1c1;
        }
        .equal {
            display: flex;
            display: -webkit-flex;
            flex-wrap: wrap;
        }


    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('isDeleted')): ?>
    <div class="alert alert-success text-center my-4">Category Deleted Successfully</div>
    <?php session()->forget('isDeleted')  ?>
<?php endif; ?>

<?php if(session()->has('isNotDeleted')): ?>
    <div class="alert alert-warning text-center my-4">Category can't be deleted because it has courses and they must be deleted first</div>
    <?php session()->forget('isNotDeleted')  ?>
<?php endif; ?>

    <div class="container my-5 "><a class="btn btn-primary text-light" href="<?php echo e(route('admin.createCategory')); ?>">New Category</a></div>
    <div class="container my-5">
        <div class="row">
            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 mb-4 equal">
                    <div class="category h-100 w-100 d-flex align-items-center flex-column p-3">
                        <div class="categoryImg">
                            <img src='<?php echo e(asset("uploads/categories/$category->img")); ?>' alt="<?php echo e($category->name); ?>" class="img-fluid">
                        </div>
                        <h2 class="catName"><a href="<?php echo e(route('cat',$category->id)); ?>" target="_blank"><?php echo e(Str::limit($category->name, 10, '...')); ?></a></h2>
                        <div>
                            <a class="btn btn-warning" href="<?php echo e(route('admin.catEdit',$category->id)); ?>">update</a>
                            <a class="btn btn-danger" href="<?php echo e(route('admin.catDelete',$category->id)); ?>">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center my-4">
        <?php echo $cats->render(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/admin/cats.blade.php ENDPATH**/ ?>