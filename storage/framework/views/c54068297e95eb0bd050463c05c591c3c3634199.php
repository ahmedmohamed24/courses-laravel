<?php $__env->startSection('title'); ?>
    <?php echo e(Auth('student')->user()->name); ?> | Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .course-title{
            font-size: 24px;
            text-transform: capitalize;
            margin: 10px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
   <?php if(count($courses)===0): ?>
       <div class="my-5 text-center alert alert-warning">Sorry There's No Courses yet</div>
   <?php else: ?> 
        <h1 class="text-info text-center my-4">Courses</h1>
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 my-4 ">
                        <img src='<?php echo e(asset("uploads/courses/$course->img")); ?>' alt="<?php echo e($course->title); ?>" class="img-fluid rounded">
                        <div class="courseContainer border-info">
                            <a class="text-warning course-title" href="<?php echo e(route('course',$course->id)); ?>"><?php echo e(Str::limit($course->title,10)); ?></a>
                            <p><?php echo e(Str::limit($course->desc,40)); ?></p>
                            <p>price: <?php echo e($course->price); ?>$</p>
                            <h5>Category: </h5>
                            <a href="<?php echo e(route('cat',$course->category->id)); ?>" class="text-primary"><?php echo e($course->category->name); ?></a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
   <?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front/layout/frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/student/dashboard.blade.php ENDPATH**/ ?>