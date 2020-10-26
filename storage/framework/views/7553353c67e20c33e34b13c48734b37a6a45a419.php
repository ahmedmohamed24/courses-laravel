<?php $__env->startSection('style'); ?>
    <style>
        .course-cover{
            width:50px;
            height:50px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title'); ?>
    Instructor |<?php echo e(Str::limit( Auth('instructor')->user()->name, 10, '...')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="container my-5">
        <a href="<?php echo e(route('instructor.add')); ?>" class=" btn btn-primary">New Course</a>
    </div>
    <?php if(count($courses) === 0): ?>
        <div class="alert alert-warning">There is no courses yet</div>
    <?php else: ?>
        <table class="table container">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td><img src="<?php echo e(asset("/uploads/courses/$course->img")); ?>" class="course-cover" alt="<?php echo e($course->title); ?>"></td>
                            <td><?php echo e($course->title); ?></td>
                            <td><?php echo e($course->category->name); ?></td>
                            <td><a href="<?php echo e(route('instructor.lecture.add',$course->id)); ?>" class="btn btn-info">New Lecture</a></td>
                        </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('instructor.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/instructor/dashboard.blade.php ENDPATH**/ ?>