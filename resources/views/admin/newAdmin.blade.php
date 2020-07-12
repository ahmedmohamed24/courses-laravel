@extends('admin/layout')

@section('title')
    Admin | add new admin
@endsection
@section('style')
    <style>
        form{
            min-height:60vh;
        }
    </style>
@endsection
@section('content')
    @if (session()->has('isAdminAdded'))
        <?php session()->forget('isAdminAdded'); ?>
        <div class="alet alert-success my-4 container text-center p-4">Admin Added successfully</div>
    @endif
    @include('admin/inc/error')
    <form class="my-5 container" method="POST" action="{{ route('admin.save') }}">
        @csrf

        <div class="form-group">
            <label for="name" class="text-primary">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email" class="text-primary">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password" class="text-primary">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <button class="btn btn-primary" type="submit">Add</button>
    </form>
@endsection
