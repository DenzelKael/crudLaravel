 
<?php $__env->startSection('content'); ?>
    <div class="">
        
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Nro Extracto</th>
                    <th>Nro Banco</th>
                    <th>Nro Servicio</th>
                    <th>Fecha</th>
                    <th>AG</th>
                    <th>Descripcion</th>
                    <th>Nro Documento</th>
                    <th>Deposito</th>
                    <th>Retiro</th>
                    <th>Saldo</th>
                    <th>Sigla</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $extractos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extracto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                    <tr class="table-<?php echo e($extracto->servicio?->color); ?>">
                        
                        <td><?php echo e($extracto->id); ?></td>
                        <td><?php echo e($extracto->id_banco); ?></td>
                        <td><?php echo e($extracto->id_servicio); ?></td>
                        <td><?php echo e($extracto->fecha); ?></td>
                        <td><?php echo e($extracto->AG); ?></td>
                        <td><?php echo e($extracto->descripcion); ?></td>
                        <td><?php echo e($extracto->nro_documento); ?></td>
                        <td><?php echo e($extracto->deposito); ?></td>
                        <td><?php echo e($extracto->monto); ?></td>
                        <td><?php echo e($extracto->saldo); ?></td>
                        <td><?php echo e($extracto->sigla); ?></td>
                     
                    </tr>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo $extractos->links(); ?>

        <a class="btn btn-danger" href="<?php echo e(url('banco')); ?>">Volver Atras</a>
        <a class="btn btn-warning" href="<?php echo e(url('cuantificador/'.$extracto->id_banco)); ?>">Cuantificar</a>
    </div>
<?php $__env->stopSection(); ?>
<script src="<?php echo e(asset('js/extractos.js')); ?>"></script>

<?php echo $__env->make('layout.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/extracto/index.blade.php ENDPATH**/ ?>