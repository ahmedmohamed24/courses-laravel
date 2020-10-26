<?php $__env->startSection('title'); ?>
    Instructor | reset password
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <form  id="reset" class="container my-5" >
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="email" class="text-primary">Enter Your Email</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="reviewErrors alert alert-danger d-none"></div>
        <div class="reviewSuccess alert alert-success d-none"></div>
        <button type="submit" class="btn btn-warning">Send</button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
                url: "<?php echo e(route('instructor.sendResetMail')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout.frontLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/instructor/reset.blade.php ENDPATH**/ ?>