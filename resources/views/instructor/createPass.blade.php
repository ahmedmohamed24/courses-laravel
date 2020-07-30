@extends('front.layout.frontLayout')
@section('title')
    istructor | reset password
@endsection
@section('content')
    <form action="{{ route('instructor.savePassword') }}" method="post" class="container my-5">
        @csrf
        <div class="form-group">
            <label for="password" class="text-primary">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="alert alert-danger my-3 text-center">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password-c" class="text-primary">Confirm Password</label>
            <input type="password" class="form-control" id="password-c"  name="password-c">
            @error('password-c')
                <div class="alert alert-danger my-3 text-center">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-warning">Reset</button>
    </form>
@endsection
