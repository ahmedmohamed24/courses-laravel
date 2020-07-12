@extends('admin/layout')

@section('title')
    Admin | settings
@endsection
@section('style')
    <style>

    </style>
@endsection
@section('content')

    @if (session()->has('isUpdated'))
        <?php session()->forget('isUpdated'); ?>
        <div class="alet alert-success my-4 container text-center p-4">Password updated successfully</div>
    @endif
    @if (session()->has('isNotUpdated'))
        <?php session()->forget('isNotUpdated'); ?>
        <div class="alet alert-danger my-4 container text-center p-4">Enter a valid data, please</div>
    @endif
    <div class="container my-5">
        <h1 class="mb-2 text-info">Info: </h1>
        <h5 ><strong class="text-primary">Name: </strong>{{ auth('admin')->user()->name }}</h5>
        <h5 ><strong class="text-primary">Email: </strong>{{ auth('admin')->user()->email }}</h5>
    </div>
    @include('admin/inc/error')
    <div class="container">
        <h2 class="text-info mb-4">Change Password: </h2>
        <form action="{{ route('admin.change') }}" method="POST">
            @csrf
            <input type="password" name="password" class="form-control my-2" placeholder="old password">
            <input type="password" name="newPass" class="form-control my-2" placeholder="New password">
            <input type="password" name="ConfirmNewPass" class="form-control my-2" placeholder="confirm new password">
            <button class="btn btn-outline-warning  my-2"type="submit">Change</button>
        </form>
    </div>
@endsection
