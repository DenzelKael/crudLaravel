
<?php $__env->startSection('content_header'); ?>
    <h1>Guardar Extracto Bancario</h1>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row ">
        <div class="card mr-2 col-12 col-lg-3">
            <div class="card-body">
                <div class=" bg-opacity-10  rounded">
                    <form action="<?php echo e(url('/archivo')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo $__env->make('archivo.form', ['modo' => 'Guardar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </form>
                </div>
            </div>
        </div>
        <?php echo $__env->make('archivo.table_archivo', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/archivo/index.blade.php ENDPATH**/ ?>