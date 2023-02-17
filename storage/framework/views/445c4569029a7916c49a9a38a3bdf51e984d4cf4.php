
<?php $__env->startSection('content-header'); ?>
    <h2>Listado de Servicios</h2>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <div class="">

        <?php if(Session::has('mensaje')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(Session::get('mensaje')); ?>


                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>




        <a class="btn btn-success" href="<?php echo e(url('servicio/create')); ?>">Registrar Nuevo Servicio</a>
        <br><br>
        <table id="servicios" class="table table-light ">
            <thead class="thead-light align-middle">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Sigla</th>
                    <th>Precio</th>
                    <th>Costo</th>
                    <th>Diferencia</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="table-primary"><?php echo e($servicio->id); ?></td>
                        <td class="table-danger" style="text-transform: uppercase"><?php echo e($servicio->nombre); ?></td>
                        <td class="table-warning" style="text-transform: uppercase"><?php echo e($servicio->sigla); ?></td>
                        <td class="table-success"><?php echo e($servicio->precio); ?></td>
                        <td><?php echo e($servicio->costo); ?></td>
                        <td class="table-info"><?php echo e($servicio->diferencia); ?></td>
                        <td><?php echo e($servicio->descripcion); ?></td>
                        <td>
                            <a title="Editar" href="<?php echo e(url('banco/' . $servicio->id . '/edit')); ?>" class="btn btn-warning">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>
                            <form action="<?php echo e(url('banco/' . $servicio->id)); ?>" method="post" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo e(method_field('DELETE')); ?>

                                <button title="Eliminar" class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿Quieres realmente borrar?')" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form> 

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
         <?php echo $servicios->links(); ?> 
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlte', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/servicio/index.blade.php ENDPATH**/ ?>