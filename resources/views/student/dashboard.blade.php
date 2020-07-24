@extends('front/layout/frontLayout')

@section('title')
    {{ Auth('student')->user()->name }} | Dashboard
@endsection
@section('style')
    <style>
        .course-title{
            font-size: 24px;
            text-transform: capitalize;
            margin: 10px;
        }
    </style>
@endsection
@section('content')
   @if (count($courses)===0)
       <div class="my-5 text-center alert alert-warning">Sorry There's No Courses yet</div>
   @else 
        <h1 class="text-info text-center my-4">Courses</h1>
        <div class="container">
            <div class="row">
                @foreach ($courses as $course)
                    <div class="col-md-4 my-4 ">
                        <img src='{{ asset("uploads/courses/$course->img") }}' alt="{{ $course->title }}" class="img-fluid rounded">
                        <div class="courseContainer border-info">
                            <a class="text-warning course-title" href="{{ route('course',$course->id) }}">{{ Str::limit($course->title,10) }}</a>
                            <p>{{ Str::limit($course->desc,40) }}</p>
                            <p>price: {{ $course->price }}$</p>
                            <h5>Category: </h5>
                            <a href="{{ route('cat',$course->category->id) }}" class="text-primary">{{ $course->category->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
   @endif

@endsection