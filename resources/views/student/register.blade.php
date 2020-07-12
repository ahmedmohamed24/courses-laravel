@extends('front/layout/frontLayout')

@section('title')
    Student | login
@endsection
@section('content')
    @if (session()->has('isNotStudent'))
        <?php session()->forget('isNotStudent') ?>
        <div class="text-center alert alert-warning my-4">You should Register First</div>
    @endif
    <h1 class="text-info text-center">Student Register</h1>
    <p class=" container">Register as, <a class="text-primary" href="{{ route('instructor.register') }}">Instructor ?</a></p>
    <form action="{{ route('student.doRegister') }}" class="container my-5" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger text-center my-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger text-center my-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="alert alert-danger text-center my-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirm-Password">
            @error('confirm-Password')
                <div class="alert alert-danger text-center my-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="img">Image</span>
                </div>
                <div class="custom-file">
                  <input type="file" name="img" value="{{ old('img') }}" class="custom-file-input" id="img1" aria-describedby="img">
                  <label class="custom-file-label" for="img1">Choose file</label>
                </div>
            </div>
            @error('img')
                    <div class="alert alert-danger text-center my-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="DOB">Date of Birth</label>
            <input type="date" class="form-control" id="DOB" name="DOB">
            @error('DOB')
                <div class="alert alert-danger text-center my-3">{{ $message }}</div>
            @enderror
        </div>
        <p class=" container">Already User? <a class="text-primary" href="{{ route('instructor.register') }}">Login ?</a></p>
        <button class="btn btn-primary">Register</button>
    </form>
@endsection
