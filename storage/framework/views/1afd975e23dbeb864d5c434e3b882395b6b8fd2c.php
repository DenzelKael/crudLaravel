
<?php $__env->startSection('content'); ?>
<div class="container">
<form action="<?php echo e(url('/servicio')); ?>" method="post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
    <?php echo $__env->make('servicio.form', ['modo'=>'Crear'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/servicio/create.blade.php ENDPATH**/ ?>