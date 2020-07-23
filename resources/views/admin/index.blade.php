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
        <div class="reviewSuccess alert alert-success d-none"></div>
        <button class="btn btn-warning" type="submit">Update</button>
    </form>

@endsection

@section('script')
    <script>
        $('#homeForm').submit((e)=>{
            e.preventDefault();
            let formData= new FormData($('#homeForm')[0]);
            //make the both containers for success message and error messages empty and hidden again
            const successContainer=document.querySelector('.reviewSuccess');
            const errorContainer=document.querySelector('.reviewErrors');
            successContainer.innerHTML="";
            successContainer.classList.add('d-none');
            errorContainer.innerHTML="";
            errorContainer.classList.add('d-none');
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
                    if (data.status == true) {
                        successContainer.classList.remove('d-none');
                        successContainer.innerHTML=data.msg;
                    }else{
                        errorContainer.classList.remove('d-none');
                        for(let msg in data.msg){
                            var temp=document.createElement('P');
                            temp.innerHTML=data.msg[msg][0];
                            errorContainer.appendChild(temp)
                           
                        }
                        
                    }
                },
                
            });
        })
    </script>
@endsection