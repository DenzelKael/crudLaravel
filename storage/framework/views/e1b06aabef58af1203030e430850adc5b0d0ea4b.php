 
<?php $__env->startSection('content'); ?>
    <div class="container">
    
    
         
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Nro Extracto</th>
                    <th>Nro Archivo</th>
                    <th>Nro Servicio</th>
                    <th>Fecha</th>
                    <th>AG</th>
                    <th>Descripcion</th>
                    <th>Nro Documento</th>
                    <th>Monto</th>
                    <th>Saldo</th>
                    <th>Sigla</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $extractos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extracto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                    <tr class="<?php if(trim($extracto->monto) == '-17.00' &&
                        trim($extracto->descripcion) == 'N/D PAGO SEGIP MEDIANTE UNINET'): ?> table-danger
            <?php elseif(trim($extracto->monto) == '-80.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'): ?>
                table-warning                        
            <?php elseif(trim($extracto->monto) == '-200.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR'): ?>
                table-success  
            <?php elseif(trim($extracto->monto) == '-225.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'): ?>
            table-warning                         
            <?php elseif(trim($extracto->monto) == '-30.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT'): ?>
                table-primary    
                <?php elseif(trim($extracto->monto) == '-50.00' &&
                trim($extracto->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT'): ?>
            table-primary                            
            <?php elseif(trim($extracto->monto) == '-20.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT'): ?>
            table-primary                           
            <?php elseif(trim($extracto->monto) == '-50.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR'): ?>
            table-success
            <?php elseif(trim($extracto->monto) == '-80.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR'): ?>
            table-success                        
            <?php elseif(trim($extracto->monto) == '-10.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'): ?>                            
               table-info                           
            <?php elseif(trim($extracto->monto) == '-160.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'): ?>
            table-warning                             
            <?php elseif(trim($extracto->monto) == '-60.00' &&
                    trim($extracto->descripcion) == 'N/D TRASP. A ANH - RECAUDADORA'): ?>    
                table-secondary
            <?php else: ?>
                P_OTROS <?php endif; ?>">
                        
                        <td><?php echo e($extracto->id); ?></td>
                        <td><?php echo e($extracto->id_archivo); ?></td>
                        <td><?php echo e($extracto->id_servicio); ?></td>
                        <td><?php echo e($extracto->fecha); ?></td>
                        <td><?php echo e($extracto->AG); ?></td>
                        <td><?php echo e($extracto->descripcion); ?></td>
                        <td><?php echo e($extracto->nro_documento); ?></td>
                        <td><?php echo e($extracto->monto); ?></td>
                        <td><?php echo e($extracto->saldo); ?></td>
                        <td><?php echo e($extracto->sigla); ?></td>
                     
                    </tr>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo $extractos->links(); ?>

        <a class="btn btn-danger" href="<?php echo e(url('archivo')); ?>">Volver Atras</a>
        <a class="btn btn-warning" href="<?php echo e(url('cuantificador/'.$extracto->id_archivo)); ?>">Cuantificar</a>
    </div>
<?php $__env->stopSection(); ?>
<script src="<?php echo e(asset('js/extractos.js')); ?>"></script>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/extracto/index.blade.php ENDPATH**/ ?>