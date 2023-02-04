
<?php $__env->startSection('content'); ?>


    <div class="container">
        <?php if(Session::has('mensaje')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(Session::get('mensaje')); ?>


                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <a class="btn btn-success" href="<?php echo e(url('plataforma/create')); ?>">Registrar Nueva plataforma</a>
        <br><br>
        <table class="table table-light ">
            <thead class="thead-light align-middle">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                <?php $__currentLoopData = $plataformas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plataforma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                       <td><?php echo e($plataforma->id); ?></td>
                        <td class="table-primary" style="text-transform: uppercase"><?php echo e($plataforma->nombre); ?></td>
                        <td ><?php echo e($plataforma->descripcion); ?></td>
                        <td ><?php echo e($plataforma->saldo); ?></td>
                        <td>
                            <a href="<?php echo e(url('plataforma/' . $plataforma->id . '/edit')); ?>" class="btn btn-warning">Editar</a>


                            <form action="<?php echo e(url('plataforma/' . $plataforma->id)); ?>" method="post" class="d-inline">
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
        <?php echo $plataformas->links(); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Changa\resources\views/plataforma/index.blade.php ENDPATH**/ ?>