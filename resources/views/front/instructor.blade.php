@extends('front.layout.frontLayout')



@section('title')
    {{ Str::limit($instructor->name,20) }}
@endsection
@section('content')
    <main class="my-5">
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <h1>{{ $instructor->name }}</h1>
                    <p><strong>About: </strong>{{  $instructor->about }}</p>
                    @if ($instructor->specialize !== null)
                        <p><strong>specialize: </strong> {{ $instructor->specialize }}</p>
                    @endif
                    @if ($instructor->experience !== null)
                        <p><strong>experience:</strong> {{ $instructor->experience }}</p>
                    @endif
                </div>
                <div class="col-md-6">
                    <img src='{{ asset("uploads/instructors/$instructor->img") }}' alt="{{ $instructor->name }}">
                </div>
            </div>
        </div>
        <div class="container">
            @if ($instructor->Course !== null)
                <h2>Courses: </h2>
            @endif
            @foreach ($instructor->Course as $course)
                <h5><a href="{{ route('course',$course->id) }}" class="text-primary">{{ $course->title }}</a></h5>
            @endforeach
        </div>
    </main>
@endsection
