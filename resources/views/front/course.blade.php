@extends('front.layout.frontLayout')

@section('style')

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
    </style>
@endsection

@section('title')
    {{ Str::limit($course->title,20) }}
@endsection
@section('content')
    <main class="my-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <h1>{{ $course->title }}</h1>
                    <p>{{ $course->desc }}</p>
                    <p>price: {{ $course->price }}$</p>
                    <h5>Category: </h5>
                    <a href="{{ route('cat',$course->category->id) }}" class="text-primary">{{ $course->category->name }}</a>
                </div>
                <div class="col-md-6">
                    <img src='{{ asset("uploads/courses/$course->img") }}' alt="{{ $course->title }}" class="img-fluid rounded">
                </div>
            </div>
        </div>
        <div class="container my-5">
            <h2 class="text-primary">Lectures:</h2>
            @foreach ($course->lecture as $lecture)

              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="heading{{$lecture->id}}">
                    <h2 class="mb-0">
                      <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$lecture->id}}" aria-expanded="true" aria-controls="collapseOne">
                        {{ Str::limit($lecture->title,100)}}
                      </button>
                    </h2>
                  </div>

                  <div id="collapse{{$lecture->id}}" class="collapse " aria-labelledby="heading{{$lecture->id}}" data-parent="#accordionExample">
                    <div class="card-body">
                        {{ Str::limit($lecture->desc,150) }}
                        <span>Duration: {{ $lecture->duration }}</span>
                        <div class="w-50"><button class="lectureBtn btn-warning rounded text-light" lecture-data="{{$lecture->id}}">View</button></div>
                        <div class="lecture-{{$lecture->id}}-image d-none"><span class="lecture-close"><i class="fa fa-times-circle" aria-hidden="true"></i></span><img calss="" src="{{ asset("uploads/lectures/$lecture->img") }}" alt="{{ $lecture->title }}"></div>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h5>Instructor: <a href="{{ route('instructor',$course->instructor->id) }}" class="text-primary">{{ $course->instructor->name }}</a></h5>
                        <h5 class="my-4">About: <p>{{ $course->instructor->about }}</p></h5>
                        <h5 class="my-4">Specialize: <p>{{ $course->instructor->specialize }}</p></h5>
                        <h5 class="my-4">Experience: <p>{{ $course->instructor->experience }}</p></h5>
                    </div>
                    <div class="col-sm-6">
                        <?php $instImg=$course->instructor->img ?>
                        <img src='{{ asset("uploads/instructors/$instImg")}}' alt="{{ $course->instructor->name }}">
                    </div>
                </div>


            </div>

        </div>
    </main>
    <div class="container  my-5">
        <div class="row reviewsContainer m-auto">
            @if (count($course->review )>0)
                @foreach ($course->review as $review)

                    <div class="col-md-1 @if ($loop->index > 3) review_col d-none @endif"></div>
                    <div class="col-md-5 mb-3 p-2 col-sm-10 equal review_col @if ($loop->index > 3) d-none @endif">
                        <div class="review rounded-lg  p-4 mb-3 h-100 w-100 text-center">
                            <?php $img=$review->student->img;?>
                            @if ($img === null)
                                <img src="{{ asset("assets/img/gallery/testimonial.png") }}" class="" alt="{{ $review->student->name }}">
                            @else
                                <img src="{{ asset("uploads/students/$img") }}" class=" " alt="{{ $review->student->name }}">
                            @endif
                            <h5 class="reviewOwner my-4">{{ $review->student->name }}</h5>
                            <p class="reviewContent my-4">{{ $review->content }}</p>
                            <div class="review-ratting">
                                @for ($i = 0; $i < $review->rate; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                @for ($i = $review->rate; $i < 5; $i++)
                                    <i class="far fa-star"></i>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <button class="btn btn-outline-primary loadMoreBtn mx-auto d-block" onclick="loadReviews()">Load More</button>
      </div>
    <form id="reviewForm" class="container bg-light  rounded py-4 my-4">
        <div class="addReviewContainer m-auto text-center">
            <h2 class="text-center mb-2 reviewHeader text-primary">Share Your Review</h2>
            <div class="reviwerStars d-flex mb-4">
                <input type="radio" name="star" id="star5" value="5"><label for="star5"></label>
                <input type="radio" name="star" id="star4" value="4"><label for="star4"></label>
                <input type="radio" name="star" id="star3" value="3"><label for="star3"></label>
                <input type="radio" name="star" id="star2" value="2"><label for="star2"></label>
                <input type="radio" name="star" id="star1" value="1"><label for="star1"></label>
            </div>
            <textarea name="reviewDesc"  cols="30" rows="5" class="form-control" placeholder="Write Your review Here ...."></textarea>
            <button class="btn btn-outline-info mt-3 "  type="submit">Submit</button>
        </div>@guest disabled @endguest
    </form>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $('.lectureBtn').click((e)=>{
            var lecture=e.target.attributes['lecture-data'].nodeValue;
            $(`.lecture-`+lecture+`-image`).addClass('showLectureImage');
        });
        $('.lecture-close').click((e)=>{
            $(".showLectureImage").removeClass("showLectureImage");
        });
        let index=3;
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
        $('#reviewForm').submit(function(e){
            e.preventDefault();
            let formData= new FormData($('#reviewForm')[0]);
            $.ajax({
                type: 'post',
                //enctype: 'multipart/form-data',
                url: "{{route('course.addReview')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    if (data.status == true) {
                        console.log("sent");
                    }
                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        console.log(key);
                        console.log(value);
                    });
                }
            });
        });


    </script>
@endsection

