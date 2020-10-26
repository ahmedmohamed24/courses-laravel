<?php $__env->startSection('title'); ?>
    Courses | search result
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin/inc/error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(count($courses) === 0): ?>
        <h2 class="alert alert-warning my-5 text-center">Sorry, there is no results</h2>
    <?php endif; ?>
    <main>
        <section class="my-5 container">
            <div class="row">
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6 equal ">
                    <!-- Single course -->
                    <div class="single-course mb-70 h-100 ">
                        <div class="course-img">
                            <img src="<?php echo e(asset("uploads/courses/$course->img")); ?>" class="img-fluid" alt="<?php echo e($course->title); ?>">
                        </div>
                        <div class="course-caption container-fluid my-3">
                            <div class="course-cap-top">
                                <h4><a href="<?php echo e(route('course',$course->id)); ?>"><?php echo e(Str::limit($course->title,15)); ?></a></h4>
                            </div>
                            <p>
                                <?php echo e(Str::limit($course->briefDesc,100)); ?>

                            </p>
                            <div class="course-cap-mid d-flex justify-content-between">
                                <div class="course-ratting">
                                    <?php
                                        $reviews=count($course->review);
                                        $temp=0;
                                        foreach ($course->review as $review) {
                                            $temp+=$review->rate;
                                        }
                                        if($temp===0){
                                            $reviewNum=0;
                                        }else{
                                            $reviewNum=floor($temp/$reviews);
                                        }
                                    ?>
                                    <?php for($i = 0; $i < $reviewNum; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                    <?php for($i = $reviewNum; $i < 5; $i++): ?>
                                        <i class="far fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                                <ul><li><?php echo e($reviews); ?> Reviews</li></ul>
                            </div>
                            <div class="course-cap-bottom d-flex justify-content-between">

                                <span>Price: <?php echo e($course->price); ?>$
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </section>

    </main>
    <div class="d-flex justify-content-center align-items-center mb-4">
        <?php echo $courses->render(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front/layout/frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/front/searchResult.blade.php ENDPATH**/ ?>