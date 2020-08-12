<?php $__env->startSection('title'); ?>
    Home Page
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<main>
        
        <?php if(session()->has('isNotAdmin')): ?>
            <div class="alert alert-danger">You are Not an admin</div>
            <?php session()->forget('isNotAdmin')  ?>
        <?php endif; ?>
        
        <?php if(session()->has('MustVerifyEmail')): ?>
            <div class="alert alert-danger text-center">Please, visit your email to verify your account</div>
            <?php session()->forget('MustVerifyEmail')  ?>
        <?php endif; ?>
        <!--? slider Area Start-->
        <div class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-7 col-md-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".2s"><?php echo e($data['home']->mainTitle); ?></span>
                                    <h1 data-animation="fadeInLeft" data-delay=".4s"><?php echo e($data['home']['secondaryTitle']); ?></h1>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn">
                                        <a href="<?php echo e(route('student.log')); ?>" class="btn hero-btn"  data-animation="fadeInLeft" data-delay=".8s">Get Started</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5">
                                <div class="hero-man d-none d-lg-block f-right" data-animation="jello" data-delay=".4s">
                                    <img src="assets/img/hero/heroman.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Single Slider -->
                <div class="single-slider slider-height d-flex align-items-center">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-7 col-md-8">
                                <div class="hero__caption">
                                    <span data-animation="fadeInLeft" data-delay=".2s">Popular Online Courses</span>
                                    <h1 data-animation="fadeInLeft" data-delay=".4s">The New Way To Learn Properly in With Us!</h1>
                                    <!-- Hero-btn -->
                                    <div class="hero__btn">
                                        <a href="<?php echo e(route('student.log')); ?>" class="btn hero-btn"  data-animation="fadeInLeft" data-delay=".8s">Get Started</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5">
                                <div class="hero-man d-none d-lg-block f-right" data-animation="jello" data-delay=".4s">
                                    <img src="assets/img/hero/heroman.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="popular-course my-4 container">
            <div class="row justify-content-sm-center">
                <div class="cl-xl-7 col-lg-8 col-md-10">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-70">
                        <span>Most Popular Course </span>
                        <h2>Our Popular Course</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $data['courses']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-lg-4 col-md-6 equal ">
                    <!-- Single course -->
                    <div class="single-course mb-70 h-100 ">
                        <div class="course-img">
                            <img src="<?php echo e(asset("uploads/courses/$course->img")); ?>" alt="<?php echo e($course->title); ?>">
                        </div>
                        <div class="course-caption">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="browse-btn2 text-center mt-4">
                        <a href="<?php echo e(route('courses')); ?>" class="btn">Find More Courses</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- slider Area End-->
        <!--? Categories Area Start -->

        <!-- Categories Area End -->
        <!--? Count Down Start -->
        <div class="count-down-area pt-5 pb-5 section-bg" data-background="assets/img/gallery/section_bg01.png">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12">
                        <div class="count-down-wrapper" >
                            <div class="row justify-content-between">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <!-- Counter Up -->
                                    <div class="single-counter text-center">
                                        <svg  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="72px" height="69px">
                                            <image  x="0px" y="0px" width="72px" height="69px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABFCAMAAADerVCrAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAB11BMVEUXmnP///8XmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnMXmnP///8qvp8aAAAAm3RSTlMAAFDr4uMPOMDMwtJjMzzHMMguXAUTrvgdzuXda/4UIr+7NTa2pVX1F7iKibnzFUFEvYcv8j7xn9+ewYPkQvARLeoCLMOAc3KBRdaFhoRW+u5XA/wIOWTaeA4rk69LHJyLKdH2qeyiqgwYs6Cn3Foktw1MbwlYaZk0lNmCEkftSRDUGVsHJaiyuhoKd+jnrfQb4Uislgt118pnASfW+mcAAAABYktHRAH/Ai3eAAAAB3RJTUUH5AUFDBg2+oR40gAAAoxJREFUWMPtmOlfEkEYxycxAQVCFJUVSMpVCBBRFMmENMxCUFO7Lc3yyg47zG677/uu3z/bLtfu+pl9sQu86BO/F+wzv332y87D7MwOhGRUoYEqaSqIVJXqOMD2LSCgiqhQFVBKkFanVySdVgZUrbQ+1TKgGhiMCmRAjSzIpKQ+pjKoDCopaAfMSkBm1MqALHVKOITUWUo9jRQNVG9VRrHWy4AaGpuUcJoaG/6ZcVQGlUHFANnANCsQA5sMyO5QtvQ77HLTiHOnIjlLPB+1uFSoZStol9pXSGC3BNQKtk2VWLSKOVq0u9WUiBB3O7Sipgd71HEI8cInNEzwd9CSnIFOkQJOWk6HX/Q8BNFFy+kOScsaMtOyuhDMhT3opS5EYfSJ34b7EKFlWXvRkw33op/afQZGcdOIfdS0fugywQCiMVrCfgwOidtDgzhAy4tFMZAO4himftNBsFKDxQg18RDi/OEwkKDuEDRgpAYDDTUxAXRyoFH1T4egZPrnCyvZONAUTg+fFLykQHmR4j7HMD5RoMZxhANNRqYKrdBUZDJ9Z9OxAjVdaG0k2lYklUH/NwiIHJUMrGO13KA/fuKk2Dt1OsqZM2ckiW0+zqtMns2MRTIbB+aEs+fmcX4mfIHBQkAwRwAbu+gClpbz3ooHuLh66TJwhWS7dnUNvmvZ09eBGzf5YN2BW7lrNjB/mz+67+BubrfSPYF79/ngwQKS+RqN4uEmbz4aRii3cKw8xsYTPjDrhWXIADzlj8/sQO6vrOU1eJ5nQWQdaH6x+hJ49Tp/729YILjI6oG3QidN7/B+KfzhIxKiBWUOiM9mQORT6jNXOdeYpJpfvnKe/5tF7H3/8ZMzf/3+Iza1EeAvtr05pHWuTqcAAAAASUVORK5CYII=" />
                                       </svg>
                                        <span class="counter color-green">1050</span>
                                        <p class="color-green">+ Topics</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <!-- Counter Up -->
                                    <div class="single-counter text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="72px" height="79px">
                                             <image  x="0px" y="0px" width="72px" height="79px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABPCAMAAAB/NnPNAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACo1BMVEX///8tMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJItMJL///9r5VNNAAAA33RSTlMAACpgeYRyURmH3McEAnb16q6Shb3VOg23sT8DDGLb+2kKSQmYD6PjJGv+72dOLlDAfNdwXvxI4QaRsJ5/GzXxFwdcbfAeFflCdPIvuHum/ZUcZovQWLwllhYrq/qAFFaGmWX09zaX5KETzczuLZt6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" />
                                        </svg>
                                        <span class="counter color-blue">1050</span>
                                        <p class="color-blue">+ Topics</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <!-- Counter Up -->
                                    <div class="single-counter text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="72px" height="71px">
                                             <image  x="0px" y="0px" width="72px" height="71px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEgAAABHCAMAAACTZfGgAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAACvlBMVEX///8tmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhctmhf////Z9I0RAAAA6HRSTlMAALv77U7Cw9xSvDlMUGXKT1MeBO5aEf3YVB/vqSMCAxI4Lof3EMfXuqcKVoNFLGjIUQ8NXXBsZMyWGqYVKi2EDkFtAS86NjNA8x3njJoUQ18IoGvkzWmkcmNg36uvwLRKF/6bJbnGfRvpsPWtZ4shdOwMNPQJxDH5Sc6Bar+jwSLL1tOyJpN30fwLtzwyWBiXgHqClTtX8jVEQhzUeFwpE52KtVvqlHF2IBaz8cXwKDfgYX7biIXJpTDdBtIH2Yn45q5I3nt8Sz2xeXPjz5j64Z7aK1Xihpz2n+Wiqrgkb5lHGai96Kx1fW7M+gAAAAFiS0dEAIgFHUgAAAAHdElNRQfkBQUMHhhwCNKbAAAEtklEQVRYw+2Y+1dUVRTHOYSAolgwiAQCQgiITigakAQiMChkIK8B8hEkSAQU6PhCI95vzCwVhDQFo0yzDALzUWlKb+mhmVr2/v4ZnXPnDjOXmXPvlKxWq+X3h9l7zrrnc89j7zP7jI2NKNt7ICe7ScSibMwE2DtwZe8ITLYWNIXIyIkOaqqVIHs50DQ4T8e91oEc5ED3wcVVZWl2fx/kRma4W5idBdBMeZAHIfd7ms/OHDTTSxFEZpnPzhxk1tfbx1sv1zEQ8TWbnTlotp/0CX9jMD4QQDzgpG+eM252FtYoUApyC7IVFRQ8l4Rg3nwm9YOgyy4PCpVbowWm6bLwDrY/bNHih/QKj4DLHYBMFImHJwa05L8KinrEGlB0zFIFUKw7VMvi+KD4BI1Gk7h8BZIUQMl4lB6pKx/jgFIMoZIq7PkqqcKMoHikEe/0DGRyQFnQZufkPo7V1PczP7jXjIEiEMX8teCAcuGx7om8fDxJ/fUFhfZSFW7Qg4qILyKF0ame4oBSMbkYcH+6RHbXkkgpyp6h7rNw44IS6KjV5Q6yoAqSQedZsJG4byLcqS0nREewmfpbtkoXaNEYiCRgw7YSYDsqeaAdcNxZ/FyV4D9fXRNoVE1tihFUB2rrG4B6HmhLhvByz0aZqQWjHk2C11zND0ifChovuha5FNHmt6KNOWVoV0yRjsxdXNALEAfkCX6u6RbPq9xd+eIegA96CdjB7Mto4IP2iju0j6X2/s5Yibo6XUTQAWa7MYMPckbPKwcP1eJV6mvMU6SaAQ5Dy4waRwgflIvevqO5oBlJyKHSxtckyu6fz7q24nVm3qjSyIBS0RUOZHoek9k1vGn6jQtqIzHHyYlCFglvnWxvT2yvGMdxQzYzvW/7yoHeQYcPe2kV/TipX5dT40AqxDHzrrDUXFC4uKoMtLRnYHDQ3z9aymnDoLBCQjryQUVex0PnhL63zoMf18hjZgjDsiBF6XCamffF4P7noAF2zhAyCTnyoKTizNozZ7qn7OVwziJZsOcQIA9yFhebVbgBp84flup8ShiaI2jlvl8IffntF0o70+03lRf5QAV8uOAj/YrLBuSFMVDcrEQ/qdoX6vJXtgz0AReVI1s/orXcTasTbgEpSqBcfakoRFvUso/7TXQpnZYD3mglXX1bLxMlkDMutY2MjGAnsXCMsF8yaGmzhiiCQsQ+n7BnhjtHTNSpZm0X7YBmV2XQqqxPG/v7Gz+LJhx9js1HJqTQqvqCBvdEgOgRsvpfqyGDrAR9qQT6SjtkjbQqhYI9sxlW6kqALOiu7ur/JWDUyeQrLSRCaRp83SO5sH3TcILdaS5LsvfbAtr23dUDYs9rDkCZEXSwCd+vue71A8pjjV2yaZU/dMMWuGmslnbdAo6lBTvCeB/5sRUFYaI/FfhJx57ryEeWoc9tNG1kNu8ozhkuhPEq7GGlls3P5bg6NoxB2G1jNmA39iUa3tiN278wZzgCowZkDtDL7Nl0YJqY/RWtuLXeQOoATv+aVgcEGQ+tuUPAbzeGIgCTC0Xb70i+eb1kE2rUxmOkDHC4JpKKYq7QlbMNkfxpc+EP2rYiUvLvS8ufgbRxemmc6Xk0exT4C5sHAOBlXXP3AAAAAElFTkSuQmCC" />
                                        </svg>
                                        <span class="counter color-green">1050</span>
                                        <p class="color-green">+ Topics</p>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <!-- Counter Up -->
                                    <div class="single-counter text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="72px" height="69px">
                                            <image  x="0px" y="0px" width="72px" height="69px"  xlink:href="data:img/png;base64,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" />
                                        </svg>
                                        <span class="counter color-red">1050</span>
                                        <p class="color-red">+ Topics</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Count Down End -->
        <!--? Popular Course Start -->
        <div class="categories-area my-4">
            <div class="container">
                <div class="row justify-content-sm-center">
                    <div class="cl-xl-7 col-lg-8 col-md-10">
                        <!-- Section Tittle -->
                        <div class="section-tittle text-center mb-70">
                            <span>Popular Online Courses</span>
                            <h2>Lets Brows All Catagori</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 equal">
                            <div class="single-cat mb-50 h-100 w-100">
                                <div class="cat-icon">
                                    <img src='<?php echo e(asset("uploads/categories/$category->img")); ?>' alt="<?php echo e($category->name); ?>">
                                </div>
                                <div class="cat-cap">
                                    <h5><a  href="<?php echo e(route('cat',$category->id)); ?>"><?php echo e($category->name); ?></a></h5>
                                    <a href="<?php echo e(route('cat',$category->id)); ?>" class="read-more1">Discover ></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-4">
                            <a href="<?php echo e(route('cats')); ?>" class="btn">Find More Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Popular Course End -->

    </main>

<?php echo $__env->make('inc/testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <?php $__env->stopSection(); ?>

<?php echo $__env->make('front/layout/frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/front/index.blade.php ENDPATH**/ ?>