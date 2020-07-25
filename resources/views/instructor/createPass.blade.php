@extends('front.layout.frontLayout')
@section('title')
    istructor | reset password
@endsection
@section('content')
    <form action="{{ route('instructor.savePassword') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="password" class="text-primary" name="password">Password</label>
            <input type="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="password-c" class="text-primary" name="password-c">Confirm Password</label>
            <input type="password" class="form-control" id="password-c">
        </div>
        <button type="submit" class="btn btn-warning">Reset</button>
    </form>
@endsection
