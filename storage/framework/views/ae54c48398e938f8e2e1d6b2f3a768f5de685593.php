

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="container p-3 bg-info bg-opacity-10 border border-info  rounded">
            <form action="<?php echo e(url('/importar')); ?>" method="post" enctype="multipart/form-data">
                <?php echo $__env->make('importar.form', ['modo' => 'Crear'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </form>
        </div>
        <br>
        <div class="container p-3 bg-info bg-opacity-10 border border-info rounded">
            
            <?php if(Session::has('mensaje')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(Session::get('mensaje')); ?>


                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>




            <a class="btn btn-success" href="<?php echo e(url('archivo/create')); ?>">Registrar Nuevo archivo</a>
            <br><br>
            <table class="table table-light ">
                <thead class="thead-light align-middle">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Costo</th>
                        <th>Existencia</th>
                        <th>Descuento</th>
                        <th>ID Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    <?php $__currentLoopData = $archivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $archivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <img class="img-thumbnail img-fluid" src="<?php echo e(asset('storage') . '/' . $archivo->archivo); ?>"
                                    width="50" alt="" srcset="">
                            </td>
                            <td style="text-transform: uppercase"><?php echo e($archivo->nombre); ?></td>
                            <td class="table-primary"><?php echo e($archivo->precio); ?></td>
                            <td><?php echo e($archivo->costo); ?></td>
                            <td
                                class="<?php if($archivo->existencia < 10): ?> table-danger
                        <?php elseif($archivo->existencia >= 100): ?>
                            table-success
                        <?php else: ?>
                            table-warning <?php endif; ?>">
                                <?php echo e($archivo->existencia); ?></td>
                            <td><?php echo e($archivo->descuento); ?></td>
                            <td><?php echo e($archivo->id_categoria); ?></td>
                            <td>
                                <a href="<?php echo e(url('archivo/' . $archivo->id . '/edit')); ?>" class="btn btn-warning">Editar</a>


                                <form action="<?php echo e(url('archivo/' . $archivo->id)); ?>" method="post" class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('DELETE')); ?>

                                    <input class="btn btn-danger" type="submit"
                                        onclick="return confirm('¿Quieres realmente borrar?')" value="Borrar">
                                </form>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo $archivos->links(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/importar/index.blade.php ENDPATH**/ ?>