
<?php $__env->startSection('content'); ?>
<div class="container">
<form action="<?php echo e(url('archivo/'.$archivo->id)); ?>" method="post"
enctype="multipart/form-data"
>
    <?php echo csrf_field(); ?>
    <?php echo e(method_field('PATCH')); ?>

    <?php echo $__env->make('archivo.form', ['modo'=>'Editar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>
</div>
<script src="<?php echo e(asset("js/archivo.js")); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/archivo/edit.blade.php ENDPATH**/ ?>