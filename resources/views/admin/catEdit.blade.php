@extends('admin/layout')

@section('style')
    <style>
        form{
            min-height: 60vh;
        }

    </style>

@endsection
@section('title')
    Category | Edit
@endsection

@section('content')
@if (session()->has('isUpdated'))
    <?php session()->forget('isUpdated') ?>
    <div class="text-center alert alert-success my-4">Category Updated successfully</div>
@endif
@include('admin/inc/error')
    <form action="{{ route('admin.catUpdate') }}" method="POST" class=" my-5 container" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="text" name="name" class="form-control" required id="name" value="{{ $category->name }}">
        </div>
        <img src="{{ asset("uploads/categories/$category->img") }}" alt="{{ $category->name }}" class="img-fluid">
        <div class="input-group m-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="uploadInput">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="in-1" name="img" aria-describedby="uploadInput">
              <label class="custom-file-label" for="in-1">Category Image</label>
            </div>
          </div>
          <input type="hidden" name="id" value="{{ $category->id }}">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
