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
        <div class="container my-5">
            <div class="reviewErrors alert alert-danger d-none"></div>
            <div class="reviewSuccess alert alert-success d-none"></div>
        </div>
        @foreach ($data as $section)
            <form id="id-{{$loop->index}}" class="my-5 formData container" >
                @csrf
                <div class="form-group">
                    <label for="sectionHeader{{$loop->index}}" class="text-primary">Section Header {{ $loop->index }}</label>
                    <input type="text" class="form-control" name="sectionHeader" id="sectionHeader{{$loop->index}}" value="{{ $section->sectionHeader }}">
                    <input type="text" class="form-control" name="sectionContent"  value="{{ $section->sectionContent }}">
                    <input type="hidden" name="id"  value="{{ $section->id }}">
                    <button class="btn btn-warning" type="submit">Update</button>
                </div>
            </form>
        @endforeach
@endsection

@section('script')
    <script>
        for(let i=0;i<2;i++){
            $(`#id-${i}`).submit((e)=>{
                ajaxSend(e,i);
            })
        }
        function ajaxSend(e,i){
            e.preventDefault();
            let formData= new FormData($(`#id-${i}`)[0]);
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
                url: "{{route('admin.updateAbout')}}",
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
        }
    </script>
@endsection