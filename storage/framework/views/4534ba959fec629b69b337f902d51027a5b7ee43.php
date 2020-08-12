<?php $__env->startSection('title'); ?>
    Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .logoImg{
            width:100;
            height:50px;
            display: block;
            margin: 15px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form id="homeForm" class="container my-5">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="siteName" class="text-primary">Site Name</label>
            <input type="text" class="form-control" name="siteName" id="siteName" value="<?php echo e($data->siteName); ?>">
        </div>
        <div class="form-group">
            <label for="mainTitle" class="text-primary">Main Title Section</label>

            <input type="text" class="form-control" name="mainTitle" id="mainTitle" value="<?php echo e($data->mainTitle); ?>">
        </div>
        <div class="form-group">
            <label for="secondaryTitle" class="text-primary">Secondary Title Section</label>
            <input type="text" class="form-control" name="secondaryTitle" id="secondaryTitle" value="<?php echo e($data->secondaryTitle); ?>">
        </div>
        <img src="<?php echo e(asset("assets/img/logo/$data->logo")); ?>" class="logoImg" alt="<?php echo e($data->siteName); ?>">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
                url: "<?php echo e(route('admin.updateHome')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/admin/index.blade.php ENDPATH**/ ?>