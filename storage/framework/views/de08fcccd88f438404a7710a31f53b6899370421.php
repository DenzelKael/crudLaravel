
<?php $__env->startSection('content'); ?>
<?php
    $totalComission = 0;
?>
    <div class="container">
        <?php if(Session::has('mensaje')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(Session::get('mensaje')); ?>


                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        

        <table class="table table-light ">
            <thead class="thead-light align-middle">
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Monto</th>
                    <th>Sigla Servicio</th>
                    <th>Cantidad</th>
                    <th>Capital</th>
                    <th>Comision</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php $__currentLoopData = $cuantificadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cuantificador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr
                        class="<?php if(trim($cuantificador->monto) == '-17.00' &&
                                trim($cuantificador->descripcion) == 'N/D PAGO SEGIP MEDIANTE UNINET'): ?> table-danger
                    <?php elseif(trim($cuantificador->monto) == '-80.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'): ?>
                        table-warning                        
                    <?php elseif(trim($cuantificador->monto) == '-200.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR'): ?>
                        table-success  
                    <?php elseif(trim($cuantificador->monto) == '-225.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'): ?>
                    table-warning                         
                    <?php elseif(trim($cuantificador->monto) == '-30.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT'): ?>
                        table-primary    
                        <?php elseif(trim($cuantificador->monto) == '-50.00' &&
                        trim($cuantificador->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT'): ?>
                    table-primary                            
                    <?php elseif(trim($cuantificador->monto) == '-20.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT'): ?>
                    table-primary                           
                    <?php elseif(trim($cuantificador->monto) == '-50.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR'): ?>
                    table-success
                    <?php elseif(trim($cuantificador->monto) == '-80.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR'): ?>
                    table-success                        
                    <?php elseif(trim($cuantificador->monto) == '-10.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'): ?>                            
                       table-info                           
                    <?php elseif(trim($cuantificador->monto) == '-160.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'): ?>
                    table-warning                             
                    <?php elseif(trim($cuantificador->monto) == '-60.00' &&
                            trim($cuantificador->descripcion) == 'N/D TRASP. A ANH - RECAUDADORA'): ?>    
                        table-secondary
                    <?php else: ?>
                        P_OTROS <?php endif; ?>">
                        <td><?php echo e($cuantificador->id_archivo); ?></td>
                        <td><?php echo e($cuantificador->descripcion); ?></td>
                        <td class="text-center"><?php echo e($cuantificador->monto); ?></td>
                        <td class="text-center"><?php echo e($cuantificador->servicio?->sigla); ?></td>
                        <td class="text-center h3 bold"><kbd><?php echo e($cuantificador->cantidad); ?></kbd></td>
                        <td class="text-center h3 bold table-danger"><kbd><?php echo e($cuantificador->servicio?->costo *$cuantificador->cantidad); ?></kbd></td>
                        <td class="text-center h3 bold table-warning"><kbd><?php echo e($cuantificador->servicio?->diferencia * $cuantificador->cantidad); ?></kbd></td>
                        <td class="text-center h3 bold table-success"><kbd><?php echo e($cuantificador->servicio?->precio * $cuantificador->cantidad); ?></kbd></td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
            <td>total</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center"><?php echo e($totalComission); ?></td>
            <td></td>
            </tfoot>
        </table>
       
        <a class="btn btn-danger" href="<?php echo e(url('extracto')); ?>">Volver Atras</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/cuantificador/index.blade.php ENDPATH**/ ?>