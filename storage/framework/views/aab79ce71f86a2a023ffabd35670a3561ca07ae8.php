<?php $__env->startSection('title'); ?>
    Admin
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .logoImg{
            width:200px;
            height:200px;
        }    
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <form id="homeForm" class="container my-5"> 
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="phone" class="text-primary">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="<?php echo e($data->phone); ?>">
        </div>
        <div class="form-group">
            <label for="email" class="text-primary">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo e($data->email); ?>">
        </div>
        <div class="form-group">
            <label for="address" class="text-primary">Address</label>
            <textarea name="address" id="address" class="form-control"><?php echo e($data->address); ?></textarea>
        </div>
        <div class="form-group">
            <label for="facebook" class="text-primary">facebook</label>
            <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo e($data->facebook); ?>">
        </div>
        <div class="form-group">
            <label for="twitter" class="text-primary">twitter</label>
            <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo e($data->twitter); ?>">
        </div>
        <div class="form-group">
            <label for="github" class="text-primary">github</label>
            <input type="text" class="form-control" name="github" id="github" value="<?php echo e($data->github); ?>">
        </div>
        <div class="form-group">
            <label for="gmail" class="text-primary">gmail</label>
            <input type="text" class="form-control" name="gmail" id="gmail" value="<?php echo e($data->gmail); ?>">
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
                enctype: 'multipart/form-data',
                url: "<?php echo e(route('admin.updateContacts')); ?>",
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
<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/admin/contacts.blade.php ENDPATH**/ ?>