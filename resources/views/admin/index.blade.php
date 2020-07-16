@extends('admin/layout')


@section('title')
    Admin
@endsection

@section('content')

    <form action="" class="container my-5">
        <h2 class="text-center text-info ">About Us Page</h2>
        {{-- {!! dd( json_decode($data->AboutUs,true)) !!} --}}
            @foreach (json_decode($data->AboutUs,true) as $aboutSecHeader => $aboutSecVal)
                <div class="form-group">
                    <input type="text" class="form-control" name="" value="{{  $aboutSecHeader }}">
                    <textarea name="" class="form-control" cols="30" rows="4">{{ $aboutSecVal }}</textarea>
                </div>
            @endforeach
        
        <button class="btn btn-primary">Save</button>
        <a href="" class="btn btn-primary">Add new Section</button>
    </form>


    <form class="container my-4" id="updateSiteName">
        @csrf
        
        <h2 class="text-center text-info ">Information</h2>
        
        <div class="from-group my-4 ">
            <label for="1" class="text-primary">Web Site Name:</label>
            <input type="text" id='1' name="siteName" class="form-control" value=" ">  
        </div>
        <div class="from-group my-4 ">
            <label for="2" class="text-primary">Main Title:</label>
            <textarea id="2" name="mainTitle" class="form-control" cols="30" rows="3"></textarea>
        </div>
        <div class="from-group my-4 ">
            <label for="3" class="text-primary">Secondary Title:</label>
            <input type="text" id="3" name="secTitle" class="form-control" />
        </div>
        <div class="from-group my-4 ">
            <label for="4" class="text-primary">contacts Email:</label>
            <input type="email" id='4' name="email" class="form-control">
        </div>
        <div class="from-group my-4 ">
            <label for="5" class="text-primary">contacts Phone:</label>
            <input type="text" id='5' name="phone" class="form-control" value=" ">  
        </div>
        <div class="from-group my-4 ">
            <label for="6" class="text-primary">Contacts Address:</label>
            <textarea id="6" name="address" class="form-control" cols="30" rows="3"></textarea>
        </div>
        <div class="from-group my-4 ">
            <label class="text-primary">Social Links:</label>
            <input type="text" name="facebook" class="form-control" value=" ">  
            <input type="text" name="gmail" class="form-control" value=" ">  
            <input type="text" name="github" class="form-control" value=" ">  
            <input type="text" name="twitter" class="form-control" value=" ">  
        </div>
        <button class="btn btn-warning">Update</button>
    </form>

@endsection

@section('script')
    <script>
        
    </script>
@endsection