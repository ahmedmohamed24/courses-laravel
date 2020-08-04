
<div class="testimonial-area fix pt-180 pb-180 section-bg" data-background="assets/img/gallery/section_bg03.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-9">
                <div class="h1-testimonial-active">
                    <!-- Single Testimonial $logo[0][0]->student() -->
                    <?php $__currentLoopData = $popularReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $popularReview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                        <div class="testimonial-icon mb-45 py-4">
                            <?php $temp=$popularReview[0]->student()->get('img')[0]->img; ?>
                            <img src='<?php echo e(asset("uploads/students/$temp")); ?>' style="width:100px;height:100px" class="ani-btn " alt="">
                            <div class="testimonial-caption text-center">
                                <p><?php echo e($popularReview[0]->content); ?></p>
                                <!-- Rattion -->
                                <div class="testimonial-ratting">
                                    <?php for($i = 0; $i < $popularReview[0]->rate; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?>
                                    <?php for($i = $popularReview[0]->rate; $i < 5; $i++): ?>
                                        <i class="far fa-star"></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/inc/testimonial.blade.php ENDPATH**/ ?>