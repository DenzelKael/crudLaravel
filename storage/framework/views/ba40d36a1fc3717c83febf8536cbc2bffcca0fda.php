
<?php $__env->startSection('content'); ?>
    <div class="container">
    
        <?php if(Session::has('mensaje')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(Session::get('mensaje')); ?>

            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          <?php endif; ?>




        <a class="btn btn-success" href="<?php echo e(url('empleado/create')); ?>">Registrar Nuevo Empleado</a>
        <br><br>
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $empleados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empleado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <img class="img-thumbnail img-fluid" src="<?php echo e(asset('storage') . '/' . $empleado->foto); ?>"
                                width="100" alt="" srcset="">
                        </td>
                        <td><?php echo e($empleado->foto); ?></td>
                        <td><?php echo e($empleado->nombre); ?></td>
                        <td><?php echo e($empleado->paterno); ?></td>
                        <td><?php echo e($empleado->materno); ?></td>
                        <td><?php echo e($empleado->correo); ?></td>
                        <td>
                            <a href="<?php echo e(url('empleado/' . $empleado->id . '/edit')); ?>" class="btn btn-warning">Editar</a>


                            <form action="<?php echo e(url('empleado/' . $empleado->id)); ?>" method="post" class="d-inline">
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
        <?php echo $empleados->links(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/empleado/index.blade.php ENDPATH**/ ?>