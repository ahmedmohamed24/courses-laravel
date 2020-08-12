<?php $__env->startSection('title'); ?>
    Courses Categories
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="categories-area mt-4">
    <div class="container">
        <div class="row">

            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-4 col-md-6 col-sm-6 equal">
                    <div class="single-cat mb-50 h-100 w-100">
                        <div class="cat-icon">
                            <img src='<?php echo e(asset("uploads/categories/$category->img")); ?>' alt="<?php echo e($category->name); ?>"class="img-fluid">
                        </div>
                        <div class="cat-cap">
                            <h5><a  href="<?php echo e(route('cat',$category->id)); ?>"><?php echo e($category->name); ?></a></h5>
                            <a href="<?php echo e(route('cat',$category->id)); ?>" class="read-more1">Read More ></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
</div>

   <div class="d-flex justify-content-center align-items-center my-4">
    <?php echo $categories->render(); ?>

   </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/front/categories.blade.php ENDPATH**/ ?>