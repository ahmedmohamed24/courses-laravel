<?php $__env->startSection('title'); ?>
    <?php echo e(Str::limit($instructor->name,20)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="my-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php echo e($instructor->name); ?></h1>
                    <p><strong>About: </strong><?php echo e($instructor->about); ?></p>
                    <?php if($instructor->specialize !== null): ?>
                        <p><strong>specialize: </strong> <?php echo e($instructor->specialize); ?></p>
                    <?php endif; ?>
                    <?php if($instructor->experience !== null): ?>
                        <p><strong>experience:</strong> <?php echo e($instructor->experience); ?></p>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <img src='<?php echo e(asset("uploads/instructors/$instructor->img")); ?>' alt="<?php echo e($instructor->name); ?>">
                </div>
            </div>
        </div>
        <div class="container">
            <?php if($instructor->Course !== null): ?>
                <h2>Courses: </h2>
            <?php endif; ?>
            <?php $__currentLoopData = $instructor->Course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h5><a href="<?php echo e(route('course',$course->id)); ?>" class="text-primary"><?php echo e($course->title); ?></a></h5>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/front/instructor.blade.php ENDPATH**/ ?>