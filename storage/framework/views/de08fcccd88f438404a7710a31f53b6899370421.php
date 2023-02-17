
<?php $__env->startSection('content'); ?>
<?php
    $totalCantidad =0;
    $totalComision = 0;
    $totalCapital = 0;
    $totalTotal = 0;
?>
    <div class="">
        <?php if(Session::has('mensaje')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(Session::get('mensaje')); ?>


                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <br>
        <a class="btn btn-danger" href="<?php echo e(url('home')); ?>">Volver Atras</a>
        <a class="btn btn-info" href="<?php echo e(url('pdf')); ?>">Generar PDF</a>
        <br><br>
        

        <table class="table table-light ">
            <thead class="thead-light align-middle">
                <tr class="text-center">
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Deposito ⬇</th>
                    <th>Retiro ⬆</th>
                    <th>Sigla Servicio</th>
                    <th>Cantidad</th>
                    <th>Capital</th>
                    <th>Comision</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php $__currentLoopData = $cuantificadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuantificador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="table-<?php echo e($cuantificador->servicio?->color); ?>">
                        <td><?php echo e($cuantificador->id_servicio); ?></td>
                        <td><?php echo e($cuantificador->servicio?->nombre); ?><br><?php echo e($cuantificador->descripcion); ?></td>
                        <td class="text-center"><?php echo e($cuantificador->deposito); ?></td>
                        <td class="text-center"><?php echo e($cuantificador->monto); ?></td>
                        <td class="text-center"><?php echo e($cuantificador->servicio?->sigla); ?></td>
                        <td value="<?php echo e($totalCantidad+=$cuantificador->cantidad); ?>" class="text-center h4 table-light"><kbd><?php echo e(number_format($cuantificador->cantidad, 0 )); ?></kbd></td>
                        <td value="<?php echo e($totalCapital+=$cuantificador->servicio?->costo *$cuantificador->cantidad); ?>" class="text-center h4 table-danger"><kbd><?php echo e(number_format($cuantificador->servicio?->costo *$cuantificador->cantidad , 2 )); ?></kbd></td>
                        <td value="<?php echo e($totalComision+=$cuantificador->servicio?->diferencia * $cuantificador->cantidad); ?>" class="text-center h4 table-warning"><kbd><?php echo e(number_format($cuantificador->servicio?->diferencia * $cuantificador->cantidad , 2 )); ?></kbd></td>
                        <td value="<?php echo e($totalTotal+=$cuantificador->servicio?->precio * $cuantificador->cantidad); ?>" class="text-center h4 table-success"><kbd><?php echo e(number_format($cuantificador->servicio?->precio * $cuantificador->cantidad, 2 )); ?></kbd></td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot class="table table-dark text-center h3 bold">
                <td  colspan="5">TOTALES</td>
                <td class="text-center"><?php echo e($totalCantidad); ?></td>
                <td class="text-center"><?php echo e(number_format($totalCapital, 2 )); ?></td>
                <td class="text-center"><?php echo e(number_format($totalComision, 2 )); ?></td>
                <td class="text-center"><?php echo e(number_format($totalTotal, 2 )); ?></td>  
                </tfoot>
        </table>
       
       
    </div>
    <br>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/cuantificador/index.blade.php ENDPATH**/ ?>