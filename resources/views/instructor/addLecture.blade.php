@extends('instructor/layout')

@section('title')
    Instructor | add Lecture
@endsection

@section('content')


    @if (session()->has('lectureAdded'))
        {!! session()->forget('lectureAdded') !!}
        <div class="alert alert-success my-5 text-center">Lecture Added Successfully</div>
    @endif

    <form action="{{ route('instructor.lecture.save') }}" method="POST" class=" my-5 container" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="text-primary">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
            <label for="fullDesc" class="text-primary">Description</label>
            <textarea name="desc" id="fullDesc" class="form-control">{{ old('desc') }}</textarea>
            @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="uploadInput">Upload</span>
            </div>
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="in-1" name="img" aria-describedby="uploadInput">
            <label class="custom-file-label" for="in-1">Lecture Image</label>
            </div>
        </div>
        @error('img')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="hidden" name="course" value="{{ $id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
