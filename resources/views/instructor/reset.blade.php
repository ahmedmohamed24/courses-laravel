@extends('front.layout.frontLayout')




@section('content')

    <form action="{{ route('instructor.sendResetMail') }}" class="container my-5" method="post">
        @csrf
        <div class="form-group">
            <label for="email" class="text-primary">Enter Your Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <button type="submit" class="btn btn-warning">Send</button>
    </form>
@endsection



@section('title')
    Instructor | reset password
@endsection
