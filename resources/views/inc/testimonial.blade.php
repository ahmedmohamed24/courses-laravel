
<div class="testimonial-area fix pt-180 pb-180 section-bg" data-background="assets/img/gallery/section_bg03.png">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-9 col-md-9">
                <div class="h1-testimonial-active">
                    <!-- Single Testimonial $logo[0][0]->student() -->
                    @foreach ($popularReviews as $popularReview)
                    {{-- {!! $popularReview[0]->student()->name !!} --}}
                        <div class="testimonial-icon mb-45 py-4">
                            <?php $temp=$popularReview['img']; ?>
                            <img src='{{ asset("uploads/students/$temp")  }}' style="width:100px;height:100px" class="ani-btn " alt="">
                            <div class="testimonial-caption text-center">
                                <p>{{ $popularReview['content'] }}</p>
                                <!-- Rattion -->
                                <div class="testimonial-ratting">
                                    @for ($i = 0; $i < $popularReview['rate']; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    @for ($i = $popularReview['rate']; $i < 5; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
