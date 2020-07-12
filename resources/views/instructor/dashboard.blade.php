@extends('instructor.layout')

@section('style')
    <style>
        .course-cover{
            width:50px;
            height:50px;
        }
    </style>
@endsection
@section('title')
    Instructor |{{Str::limit( Auth('instructor')->user()->name, 10, '...') }}
@endsection
@section('content')

    <div class="container my-5">
        <a href="{{ route('instructor.add') }}" class=" btn btn-primary">New Course</a>
    </div>
    @if (count($courses) === 0)
        <div class="alert alert-warning">There is no courses yet</div>
    @else
        <table class="table container">
            <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Title</th>
                  <th scope="col">Category</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><img src="{{ asset("/uploads/courses/$course->img") }}" class="course-cover" alt="{{ $course->title }}"></td>
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->category->name}}</td>
                            <td><a href="{{ route('instructor.lecture.add',$course->id) }}" class="btn btn-info">New Lecture</a></td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection
