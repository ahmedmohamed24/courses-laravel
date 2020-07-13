@extends('front/layout/frontLayout')

@section('title')
    Student | Register
@endsection
@section('content')
    <h1 class="text-info text-center mt-5">Complete Registeration</h1>
    <form action="{{ route('student.complete.auth') }}" class="container my-5" method="post">
        @csrf
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="alert alert-danger text-center my-3">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="confirmPassword">Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
            @error('confirmPassword')
                <div class="alert alert-danger text-center my-3">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Register</button>
    </form>
@endsection

