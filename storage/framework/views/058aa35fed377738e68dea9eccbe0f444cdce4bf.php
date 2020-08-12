<?php $__env->startSection('title'); ?>
    Instructors
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main>
        <!--? Team Ara Start -->
        <div class="team-area my-4">
            <div class="container">
                <div class="row">

                    <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-team mb-30">
                                <div class="team-img">
                                    <img src='<?php echo e(asset("uploads/instructors/$instructor->img")); ?>' alt="<?php echo e($instructor->name); ?>">
                                    <!-- Blog Social -->
                                    <ul class="team-social">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fas fa-globe"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-caption">
                                    <h3><a href="<?php echo e(route('instructor',$instructor->id)); ?>"><?php echo e($instructor->name); ?></a></h3>
                                    <p><?php echo e(Str::limit($instructor->about,100)); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </main>
    <div class="my-4 d-flex justify-content-center align-items-center">
        <?php echo $instructors->render(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/front/instructors.blade.php ENDPATH**/ ?>