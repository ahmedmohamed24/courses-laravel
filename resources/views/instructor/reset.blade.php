@extends('front.layout.frontLayout')


@section('title')
    Instructor | reset password
@endsection


@section('content')
    <h1 class="text-info my-5 text-center">FORGET PASSWORD</h1>
    <form  id="reset" class="container my-5" >
        @csrf
        <div class="form-group">
            <label for="email" class="text-primary">Enter Your Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="reviewErrors alert alert-danger d-none"></div>
        <div class="reviewSuccess alert alert-success d-none"></div>
        <button type="submit" class="btn btn-warning">Send</button>
    </form>
@endsection

@section('script')
    <script>
        $('#reset').submit((e)=>{
            e.preventDefault();
            let formData= new FormData($('#reset')[0]);
            //make the both containers for success messages and error messages empty and hidden again
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
                url: "{{route('instructor.sendResetMail')}}",
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
                        var temp=document.createElement('P');
                            temp.innerHTML=data.msg;
                            errorContainer.appendChild(temp)


                    }
                },

            });
        })
    </script>
@endsection
