@extends('front/layout/frontLayout')

@section('title')
    Student | login
@endsection
@section('content')

    <h1 class="text-info text-center mt-5">Student Login</h1>
    {{-- if redirected form login with social --}}
    @if (session()->has('alreadyUser'))
        <div class="alert alert-warning my-5 text-center">You are already User, login please</div>
        {!! session()->forget('alreadyUser') !!}
    @endif
    <p class=" container">Login as, <a class="text-primary" href="{{ route('instructor.log') }}">Instructor ?</a></p>
    <form action="{{ route('student.doLog') }}" class="container my-5" method="post">
        @csrf
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
        <p class=" container">Not user, <a class="text-primary" href="{{ route('student.register') }}">Register ?</a></p>
        <button class="btn btn-primary" type="submit">Log In</button>
        <a class="btn btn-primary" href="{{ route('student.socialLog','facebook') }}">Log In with facebook</a>
    </form>
@endsection

