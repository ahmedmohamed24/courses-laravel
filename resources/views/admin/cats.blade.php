@extends('admin/layout')


@section('title')
categories | Admin
@endsection

@section('style')
    <style>

        .category{
            border:2px solid #c1c1c1;
        }
        .equal {
            display: flex;
            display: -webkit-flex;
            flex-wrap: wrap;
        }


    </style>
@endsection
@section('content')

@if (session()->has('isDeleted'))
    <div class="alert alert-success text-center my-4">Category Deleted Successfully</div>
    <?php session()->forget('isDeleted')  ?>
@endif

@if (session()->has('isNotDeleted'))
    <div class="alert alert-warning text-center my-4">Category can't be deleted because it has courses and they must be deleted first</div>
    <?php session()->forget('isNotDeleted')  ?>
@endif

    <div class="container my-5 "><a class="btn btn-primary text-light" href="{{ route('admin.createCategory') }}">New Category</a></div>
    <div class="container my-5">
        <div class="row">
            @foreach ($cats as $category)
                <div class="col-md-4 mb-4 equal">
                    <div class="category h-100 w-100 d-flex align-items-center flex-column p-3">
                        <div class="categoryImg">
                            <img src='{{ asset("uploads/categories/$category->img") }}' alt="{{ $category->name }}" class="img-fluid">
                        </div>
                        <h2 class="catName"><a href="{{ route('cat',$category->id) }}" target="_blank">{{ Str::limit($category->name, 10, '...') }}</a></h2>
                        <div>
                            <a class="btn btn-warning" href="{{ route('admin.catEdit',$category->id) }}">update</a>
                            <a class="btn btn-danger" href="{{ route('admin.catDelete',$category->id) }}">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center my-4">
        {!! $cats->render() !!}
    </div>
@endsection
