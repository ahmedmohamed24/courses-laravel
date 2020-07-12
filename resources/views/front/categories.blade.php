@extends('front.layout.frontLayout')



@section('title')
    Courses Categories
@endsection
@section('content')

<div class="categories-area my-4">
    <div class="container">
        <div class="row">

            @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6 col-sm-6 equal">
                    <div class="single-cat mb-50 h-100 w-100">
                        <div class="cat-icon">
                            <img src='{{ asset("uploads/categories/$category->img") }}' alt="{{ $category->name }}"class="img-fluid">
                        </div>
                        <div class="cat-cap">
                            <h5><a  href="{{ route('cat',$category->id) }}">{{ $category->name }}</a></h5>
                            <a href="{{ route('cat',$category->id) }}" class="read-more1">Read More ></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</div>

   <div class="d-flex justify-content-center align-items-center my-4">
    {!! $categories->render() !!}
   </div>
@endsection
