@extends('front.layout.frontLayout')



@section('title')
course Category {{ $category->name }}
@endsection
@section('content')
<div class="categories-area my-4">
    <div class="container">
        <div class="row my-5">
            <div class="col-md-6">
                <div class="cat-cap">
                    <h3 class="mb-3"><strong class="text-info">Category: </strong>{{ $category->name }}</h3>
                    @if (count($category->course) !== 0)
                        <h5 class="text-info">Courses:</h5>
                        <table class="table">
                            <tbody>
                            @foreach ($category->course as $course)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td><a class="text-primary" href="{{ route('course',$course->id) }}">{{ $course->title }}</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                    @else
                          <div class="text-warning">No courses yet in this category</div>
                    @endif
                </div>
            </div>
            <div class=" col-md-6">
                <div class="cat-icon">
                    <img src='{{ asset("uploads/categories/$category->img") }}' alt="{{ $category->name }}" class="img-fluid">
                </div>

            </div>
        </div>
</div>

@endsection
