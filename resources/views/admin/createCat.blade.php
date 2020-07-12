@extends('admin/layout')

@section('style')
    <style>
        form{
            min-height: 60vh;
        }

    </style>

@endsection
@section('title')
    Category | create
@endsection

@section('content')
@if (session()->has('isUploaded'))
    <?php session()->forget('isUploaded') ?>
    <div class="text-center alert alert-success my-4">Category created successfully</div>
@endif
@include('admin/inc/error')
    <form action="{{ route('admin.saveCategory') }}" method="POST" class=" my-5 container" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name" class="text-primary">Category Name</label>
            <input type="text" name="name" class="form-control" id="name" >
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="uploadInput">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="in-1" name="img" aria-describedby="uploadInput">
              <label class="custom-file-label" for="in-1">Category Image</label>
            </div>
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
