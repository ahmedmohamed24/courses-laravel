<?php $__env->startSection('style'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <style>
        .star-review{
            border: 0;
            background: transparent;
        }
        .review{
            background-color: #f1f1f1;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.12), 0 2px 4px 0 rgba(0, 0, 0, 0.08);
        }
        .review > img{
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .reviewOwner{
            color: #3f3d63;
            font-size: 14px;
            font-weight: 700;
            line-height: 20px;
        }
        .reviewContent{
            font-size: 14px;
            color: #6c757d!important;
            line-height: 21px;
        }
        main{
            position: relative;
        }
        main::after{
            content: '';
            height: 5px;
            position: absolute;
            bottom: -15px;
            left: 20vw;
            right: 20vw;
            background-image: linear-gradient(to right , #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
        }
        @media(max-width:577px){
            main::after{
                display: none;
            }
        }
        .goldenStar{
            color:goldenrod;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(Str::limit($course->title,20)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main class="my-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <h1><?php echo e($course->title); ?></h1>
                    <p><?php echo e($course->desc); ?></p>
                    <p>price: <?php echo e($course->price); ?>$</p>
                    <h5>Category: </h5>
                    <a href="<?php echo e(route('cat',$course->category->id)); ?>" class="text-primary"><?php echo e($course->category->name); ?></a>
                </div>
                <div class="col-md-6">
                    <img src='<?php echo e(asset("uploads/courses/$course->img")); ?>' alt="<?php echo e($course->title); ?>" class="img-fluid rounded">
                </div>
            </div>
        </div>
        <div class="container my-5">
            <h2 class="text-primary">Lectures:</h2>
            <?php $__currentLoopData = $course->lecture; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecture): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="heading<?php echo e($lecture->id); ?>">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?php echo e($lecture->id); ?>" aria-expanded="true" aria-controls="collapseOne">
                        <?php echo e(Str::limit($lecture->title,100)); ?>

                      </button>
                    </h2>
                  </div>

                  <div id="collapse<?php echo e($lecture->id); ?>" class="collapse " aria-labelledby="heading<?php echo e($lecture->id); ?>" data-parent="#accordionExample">
                    <div class="card-body">
                        <?php echo e(Str::limit($lecture->desc,150)); ?>

                        <span>Duration: <?php echo e($lecture->duration); ?></span>
                        <div class="w-50"><button class="lectureBtn btn-warning rounded text-light" lecture-data="<?php echo e($lecture->id); ?>">View</button></div>
                        <div class="lecture-<?php echo e($lecture->id); ?>-image d-none"><span class="lecture-close"><i class="fa fa-times-circle" aria-hidden="true"></i></span><img calss="" src="<?php echo e(asset("uploads/lectures/$lecture->img")); ?>" alt="<?php echo e($lecture->title); ?>"></div>
                    </div>
                  </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Instructor: <a href="<?php echo e(route('instructor',$course->instructor->id)); ?>" class="text-primary"><?php echo e($course->instructor->name); ?></a></h5>
                        <h5 class="my-4">About: <p><?php echo e($course->instructor->about); ?></p></h5>
                        <h5 class="my-4">Specialize: <p><?php echo e($course->instructor->specialize); ?></p></h5>
                        <h5 class="my-4">Experience: <p><?php echo e($course->instructor->experience); ?></p></h5>
                    </div>
                    <div class="col-sm-6">
                        <?php $instImg=$course->instructor->img ?>
                        <img src='<?php echo e(asset("uploads/instructors/$instImg")); ?>' alt="<?php echo e($course->instructor->name); ?>">
                    </div>
                </div>


            </div>

        </div>
    </main>
    
    <div class="container  my-5">
        <div class="row reviewsContainer m-auto">
            <?php if(count($course->review )>0): ?>
                <?php $__currentLoopData = $course->review; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-md-1 <?php if($loop->index > 3): ?> review_col d-none <?php endif; ?>"></div>
                    <div class="col-md-5 mb-3 p-2 col-sm-10 equal review_col <?php if($loop->index > 3): ?> d-none <?php endif; ?>">
                        <div class="review rounded-lg  p-4 mb-3 h-100 w-100 text-center">
                            <?php $img=$review->student->img;?>
                            <?php if($img === null): ?>
                                <img src="<?php echo e(asset("assets/img/gallery/testimonial.png")); ?>" class="" alt="<?php echo e($review->student->name); ?>">
                            <?php else: ?>
                                <img src="<?php echo e(asset("uploads/students/$img")); ?>" class=" " alt="<?php echo e($review->student->name); ?>">
                            <?php endif; ?>
                            <h5 class="reviewOwner my-4"><?php echo e($review->student->name); ?></h5>
                            <p class="reviewContent my-4"><?php echo e($review->content); ?></p>
                            <div class="review-ratting">
                                <?php for($i = 0; $i < $review->rate; $i++): ?>
                                    <i class="fas fa-star goldenStar"></i>
                                <?php endfor; ?>
                                <?php for($i = $review->rate; $i < 5; $i++): ?>
                                    <i class="far fa-star"></i>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <button class="btn btn-outline-primary loadMoreBtn mx-auto d-block" onclick="loadReviews()">Load More</button>
      </div>
    <form id="reviewForm" class="container bg-light  rounded py-4 my-4">
        <?php echo csrf_field(); ?>
        <div class="addReviewContainer m-auto text-center">
            <h2 class="text-center mb-2 reviewHeader text-primary">Share Your Review</h2>
            <div class="reviwerStars d-flex mb-4">
                <input type="radio" name="star" id="star5" value="5" checked><label for="star5"></label>
                <input type="radio" name="star" id="star4" value="4"><label for="star4"></label>
                <input type="radio" name="star" id="star3" value="3"><label for="star3"></label>
                <input type="radio" name="star" id="star2" value="2"><label for="star2"></label>
                <input type="radio" name="star" id="star1" value="1"><label for="star1"></label>
            </div>
            <input type="hidden" name="starsRate" value="5">
            <input type="hidden" name="course" value="<?php echo e($course->id); ?>">
            <textarea name="reviewDesc"  cols="30" rows="5" class="form-control" placeholder="Write Your review Here ...."></textarea>
            <?php if(Auth::guard('student')->check()): ?>
                <button class="btn btn-outline-info mt-3 "  type="submit">Submit</button>
            <?php else: ?>
                <div class="container text-center my-3 alert alert-warning">Log in To Add your review</div>
            <?php endif; ?>
            <div class="alert alert-danger my-3 text-center reviewErrors d-none"></div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>
        $('.lectureBtn').click((e)=>{
            var lecture=e.target.attributes['lecture-data'].nodeValue;
            $(`.lecture-`+lecture+`-image`).addClass('showLectureImage');
        });
        $('.lecture-close').click((e)=>{
            $(".showLectureImage").removeClass("showLectureImage");
        });
        let index=3;
        //for loading more reviews
        function loadReviews(){
            for(let i=index+1;i<index+9;i++){
                //console.log($('.review_col')[4].classList);
                if($('.review_col')[i] === undefined){
                    $('.loadMoreBtn').attr('disabled','disabled');
                    return ;
                }else{
                    $('.review_col')[i].classList.remove('d-none');
                }
            }
            index+=4;
        }
        //for adding new review
        $('#reviewForm').submit(function(e){
            e.preventDefault();
            document.querySelector('.reviewErrors').classList.add("d-none");
            let stars=document.getElementsByName('star');
            let starsValue;
            for(let i=0;i<stars.length;i++){
                if(stars[i].checked){
                    starsValue=stars[i].value;
                }
            }
            $('starsRate').value=starsValue;
            let formData= new FormData($('#reviewForm')[0]);
            $.ajax({
                type: 'POST',
                //enctype: 'multipart/form-data',
                url: "<?php echo e(route('course.addReview')); ?>",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        console.log("sent");
                    }
                },
                error: function (xhr, status , error) {
                  $.each(xhr.responseJSON.errors , function(key , item ){
                      document.querySelector('.reviewErrors').classList.remove("d-none");
                      let err=document.createElement('DIV');
                      err.classList.remove("d-none");
                      err.innerHTML=item;
                      document.querySelector('.reviewErrors').appendChild(err);
                  })
                }
            });
        });


    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('front.layout.frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/front/course.blade.php ENDPATH**/ ?>