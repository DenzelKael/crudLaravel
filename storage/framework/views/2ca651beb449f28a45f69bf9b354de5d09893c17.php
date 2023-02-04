<h1><?php echo e($modo); ?> Plataformas Bancarias</h1>

<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger" role="alert">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <li><?php echo e($error); ?></li>   
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    </div>

<?php endif; ?>

<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input class="form-control" style="text-transform: uppercase" type="text" name="nombre"  
        value="<?php echo e(isset($plataforma->nombre) ? $plataforma->nombre:old('nombre')); ?>" id="nombre">

</div>

<div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <textarea class="form-control" type="text" name="descripcion"
        value="" id="descripcion"><?php echo e(isset($plataforma->descripcion) ? $plataforma->descripcion:old('descripcion')); ?></textarea>
</div>
<div class="form-group">
    <label for="saldo">Saldo:</label>
    <input class="form-control" style="text-transform: uppercase" type="text" name="saldo"  
        value="<?php echo e(isset($plataforma->saldo) ? $plataforma->saldo:old('saldo')); ?>" id="saldo">

</div>
<br>
<input class="btn btn-success" type="submit" value="<?php echo e($modo); ?> plataforma">
<a class="btn btn-primary" href="<?php echo e(url('plataforma/')); ?>">Volver al Inicio</a>
<br>
<?php /**PATH C:\xampp\htdocs\Changa\resources\views/plataforma/form.blade.php ENDPATH**/ ?>