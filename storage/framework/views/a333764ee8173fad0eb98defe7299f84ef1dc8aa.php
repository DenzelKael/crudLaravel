
<?php $__env->startSection('content'); ?>


    <div class="container">
        
        <?php if(Session::has('mensaje')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(Session::get('mensaje')); ?>


                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>




        <a class="btn btn-success" href="<?php echo e(url('producto/create')); ?>">Registrar Nuevo Producto</a>
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
                <?php $__currentLoopData = $productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img class="img-thumbnail img-fluid" src="<?php echo e(asset('storage') . '/' . $producto->foto); ?>"
                                width="50" alt="" srcset="">
                        </td>
                        <td style="text-transform: uppercase"><?php echo e($producto->nombre); ?></td>
                        <td class="table-primary"><?php echo e($producto->precio); ?></td>
                        <td><?php echo e($producto->costo); ?></td>
                        <td
                            class="<?php if($producto->existencia < 10): ?> table-danger
                        <?php elseif($producto->existencia >= 100): ?>
                            table-success
                        <?php else: ?>
                            table-warning <?php endif; ?>">
                            <?php echo e($producto->existencia); ?></td>
                        <td><?php echo e($producto->descuento); ?></td>
                        <td><?php echo e($producto->id_categoria); ?></td>
                        <td>
                            <a href="<?php echo e(url('producto/' . $producto->id . '/edit')); ?>" class="btn btn-warning">Editar</a>


                            <form action="<?php echo e(url('producto/' . $producto->id)); ?>" method="post" class="d-inline">
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
        <?php echo $productos->links(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/producto/index.blade.php ENDPATH**/ ?>