@extends('front.layout.frontLayout')

@section('title')
    Instructors
@endsection
@section('content')
    <main>
        <!--? Team Ara Start -->
        <div class="team-area my-4">
            <div class="container">
                <div class="row">

                    @foreach ($instructors as $instructor)
                        <div class="col-lg-4 col-md-4 col-sm-6">
                            <div class="single-team mb-30">
                                <div class="team-img">
                                    <img src='{{ asset("uploads/instructors/$instructor->img") }}' alt="{{ $instructor->name }}">
                                    <!-- Blog Social -->
                                    <ul class="team-social">
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fas fa-globe"></i></a></li>
                                    </ul>
                                </div>
                                <div class="team-caption">
                                    <h3><a href="{{ route('instructor',$instructor->id) }}">{{ $instructor->name }}</a></h3>
                                    <p>{{ Str::limit($instructor->about,100) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
    <div class="my-4 d-flex justify-content-center align-items-center">
        {!! $instructors->render() !!}
    </div>
@endsection
