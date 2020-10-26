<?php $__env->startSection('title'); ?>
    Instructor | add Lecture
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


    <?php if(session()->has('lectureAdded')): ?>
        <?php echo session()->forget('lectureAdded'); ?>

        <div class="alert alert-success my-5 text-center">Lecture Added Successfully</div>
    <?php endif; ?>

    <form action="<?php echo e(route('instructor.lecture.save')); ?>" method="POST" class=" my-5 container" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="title" class="text-primary">Title</label>
            <input type="text" name="title" class="form-control" id="title" value="<?php echo e(old('title')); ?>">
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="fullDesc" class="text-primary">Description</label>
            <textarea name="desc" id="fullDesc" class="form-control"><?php echo e(old('desc')); ?></textarea>
            <?php $__errorArgs = ['desc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            <span class="input-group-text" id="uploadInput">Upload</span>
            </div>
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="in-1" name="img" aria-describedby="uploadInput">
            <label class="custom-file-label" for="in-1">Lecture Image</label>
            </div>
        </div>
        <?php $__errorArgs = ['img'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="alert alert-danger"><?php echo e($message); ?></div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        <input type="hidden" name="course" value="<?php echo e($id); ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('instructor/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/laravel-projects/courses-laravel/resources/views/instructor/addLecture.blade.php ENDPATH**/ ?>