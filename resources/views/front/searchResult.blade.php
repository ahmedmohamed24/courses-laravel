@extends('front/layout/frontLayout')

@section('title')
    Courses | search result
@endsection

@section('content')
    @include('admin/inc/error')
    @if (count($courses) === 0)
        <h2 class="alert alert-warning my-5 text-center">Sorry, there is no results</h2>
    @endif
    <main>
        <section class="all-course mt-4">
            <div class="container">
                <div class="row">
                    <div class="all-course-wrapper">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            @foreach ($courses as $course)
                                            <div class="col-xl-4 col-lg-4 col-md-6 equal ">
                                                <!-- Single course -->
                                                <div class="single-course mb-70 h-100 ">
                                                    <div class="course-img">
                                                        <img src="{{ asset("uploads/courses/$course->img") }}" alt="{{ $course->title }}">
                                                    </div>
                                                    <div class="course-caption">
                                                        <div class="course-cap-top">
                                                            <h4><a href="{{ route('course',$course->id) }}">{{ Str::limit($course->title,15) }}</a></h4>
                                                        </div>
                                                        <p>
                                                            {{ Str::limit($course->briefDesc,100) }}
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
                                                                @for ($i = 0; $i < $reviewNum; $i++)
                                                                    <i class="fas fa-star"></i>
                                                                @endfor
                                                                @for ($i = $reviewNum; $i < 5; $i++)
                                                                    <i class="far fa-star"></i>
                                                                @endfor
                                                            </div>
                                                            <ul><li>{{ $reviews }} Reviews</li></ul>
                                                        </div>
                                                        <div class="course-cap-bottom d-flex justify-content-between">

                                                            <span>Price: {{ $course->price }}$
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="d-flex justify-content-center align-items-center mb-4">
        {!! $courses->render() !!}
    </div>
@endsection
