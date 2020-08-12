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
        <div class="container my-5">
            <div class="reviewErrors alert alert-danger d-none"></div>
            <div class="reviewSuccess alert alert-success d-none"></div>
        </div>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <form id="id-<?php echo e($loop->index); ?>" class="my-5 formData container" >
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="sectionHeader<?php echo e($loop->index); ?>" class="text-primary">Section Header <?php echo e($loop->index); ?></label>
                    <input type="text" class="form-control" name="sectionHeader" id="sectionHeader<?php echo e($loop->index); ?>" value="<?php echo e($section->sectionHeader); ?>">
                    
                    <textarea name="sectionContent" class="form-control" id="" rows="5"><?php echo e($section->sectionContent); ?></textarea>
                    <input type="hidden" name="id"  value="<?php echo e($section->id); ?>">
                    <button class="btn btn-warning" type="submit">Update</button>
                </div>
            </form>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
                url: "<?php echo e(route('admin.updateAbout')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/admin/about.blade.php ENDPATH**/ ?>