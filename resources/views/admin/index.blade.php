@extends('admin/layout')


@section('title')
    Admin
@endsection
@section('style')
    <style>
        .logoImg{
            width:200px;
            height:200px;
        }    
    </style>
@endsection
@section('content')
    @include('admin.inc.error')
    <form id="homeForm" class="container my-5">
        @csrf
        <div class="form-group">
            <label for="siteName" class="text-primary">Site Name</label>
            <input type="text" class="form-control" name="siteName" id="siteName" value="{{ $data->siteName }}">
        </div>
        <div class="form-group">
            <label for="mainTitle" class="text-primary">Main Title Section</label>
            
            <input type="text" class="form-control" name="mainTitle" id="mainTitle" value="{{ $data->mainTitle }}">
        </div>
        <div class="form-group">
            <label for="secondaryTitle" class="text-primary">Secondary Title Section</label>
            <input type="text" class="form-control" name="secondaryTitle" id="secondaryTitle" value="{{ $data->secondaryTitle }}">
        </div>
        <img src="{{ public_path("assets/img/logo/$data->logo") }}" class="logoImg" alt="{{ $data->siteName }}">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="uploadInput">Upload</span>
            </div>
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="in-1" name="logo" aria-describedby="uploadInput">
            <label class="custom-file-label" for="in-1">Site LOGO</label>
            </div>
        </div>
        <div class="reviewErrors alert alert-danger d-none"></div>
        <button class="btn btn-warning" type="submit">Update</button>
    </form>


    {{-- <form class="container my-4" id="updateSiteName">
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
    </form> --}}

@endsection

@section('script')
    <script>
        $('#homeForm').submit((e)=>{
            e.preventDefault();
            let formData= new FormData($('#homeForm')[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                enctype: 'multipart/form-data',
                url: "{{route('admin.updateHome')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {
                    console.log(data);
                    if (data.status == true) {
                        console.log("sent");
                    }
                },
                error: function (xhr, status , error) {
                  $.each(xhr.responseJSON.errors , function(key , item ){
                      document.querySelector('.reviewErrors').classList.remove("d-none");
                      let err=document.createElement('DIV');
                      err.classList.remove("d-none");
                      err.innerHTML=item;
                      document.querySelector('.reviewErrors').appendChild(err);
                  })
                }
            });
        })
    </script>
@endsection