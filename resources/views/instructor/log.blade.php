@extends('front/layout/frontLayout')

@section('title')
    Instructor | login
@endsection
@section('content')

    <h1 class="text-info text-center">Instructor Login</h1>

    @if (session()->has('isNotWaited'))
        {{ session()->forget('isNotWaited') }}
        <div class="alert alert-danger text-center container">Please visite your email or wait 10 minutes to resend</div>
    @endif

    <p class=" container">Log in as, <a class="text-primary" href="{{ route('student.log') }}">Student ?</a></p>
    <form action="{{ route('instructor.doLog') }}" class="container my-5" method="post">
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
            @if (session()->has('isPassWrong'))
                <?php session()->forget('isPassWrong') ?>
                <div class="text-center alert alert-danger my-4">Wrong Password</div>
            @endif
        </div>
        <p class=" container">Not User, <a class="text-primary" href="{{ route('instructor.register') }}">Register ?</a></p>
        <button class="btn btn-primary" type="submit">Log In</button>
        <p class="my-4">Forget password? <a class="text-primary" href="{{ route('instructor.resetPass') }}">CLick here</a></p>
    </form>
@endsection

