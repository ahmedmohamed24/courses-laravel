<?php $__env->startSection('title'); ?>
course Category <?php echo e($category->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="categories-area mt-4">
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6">
                <div class="cat-cap">
                    <h3 class="mb-3"><strong class="text-info">Category: </strong><?php echo e($category->name); ?></h3>
                    <?php if(count($category->course) !== 0): ?>
                        <h5 class="text-info">Courses:</h5>
                        <table class="table">
                            <tbody>
                            <?php $__currentLoopData = $category->course; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                    <td><a class="text-primary" href="<?php echo e(route('course',$course->id)); ?>"><?php echo e($course->title); ?></a></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                          </table>
                    <?php else: ?>
                          <div class="text-warning">No courses yet in this category</div>
                    <?php endif; ?>
                </div>
            </div>
            <div class=" col-md-6">
                <div class="cat-icon">
                    <img src='<?php echo e(asset("uploads/categories/$category->img")); ?>' alt="<?php echo e($category->name); ?>" class="img-fluid">
                </div>

            </div>
        </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/front/category.blade.php ENDPATH**/ ?>