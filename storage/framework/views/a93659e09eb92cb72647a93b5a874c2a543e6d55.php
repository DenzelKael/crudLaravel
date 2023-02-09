
<?php $__env->startSection('content'); ?>
<div class="">
<form action="<?php echo e(url('producto/'.$producto->id)); ?>" method="post"
enctype="multipart/form-data"
>
    <?php echo csrf_field(); ?>
    <?php echo e(method_field('PATCH')); ?>

    <?php echo $__env->make('producto.form', ['modo'=>'Editar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/producto/edit.blade.php ENDPATH**/ ?>