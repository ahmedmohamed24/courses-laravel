@extends('front.layout.frontLayout')



@section('title')
    About Us
@endsection

@section('content')
    <main>
        <!--? Hero Start -->
        <div class="slider-area">
            <div class="slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2>About Us</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!-- About Details Start -->
        <div class="about-details section-padding30">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @foreach ($data as $section)
                            <div class="about-details-cap mb-50">
                                <h4>{{ $section->sectionHeader  }}</h4>
                                <p>{{ $section->sectionContent }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>

    @include('/inc/testimonial')


@endsection
