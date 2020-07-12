@extends('instructor/layout')

@section('title')
    Instructor | add Course
@endsection

@section('content')


    @if (session()->has('courseAdded'))
        {!! session()->forget('courseAdded') !!}
        <div class="alert alert-success my-5 text-center">Course Added Successfully</div>
    @endif

    <form action="{{ route('instructor.save') }}" method="POST" class=" my-5 container" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title" class="text-primary">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-group">
            <label for="smallDesc" class="text-primary">Brief-Description</label>
            <textarea name="briefDesc" id="smallDesc" class="form-control" placeholder="Brief description about the course">{{ old('briefDesc') }}</textarea>
            @error('briefDesc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="fullDesc" class="text-primary">Description</label>
            <textarea name="desc" id="fullDesc" class="form-control" placeholder="Full description">{{ old('desc') }}</textarea>
            @error('desc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="price" class="text-primary">Price</label>
            <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}">
            @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Categories</label>
            </div>
            <select class="custom-select"  name="category"id="inputGroupSelect01">
                <option value="-1" disabled selected>Select category</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
          </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="uploadInput">Upload</span>
            </div>
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="in-1" name="img" aria-describedby="uploadInput">
            <label class="custom-file-label" for="in-1">Course Image</label>
            </div>
        </div>
        @error('img')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
