<h1><?php echo e($modo); ?> Servicio</h1>

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
        value="<?php echo e(isset($servicio->nombre) ? $servicio->nombre:old('nombre')); ?>" id="nombre">
</div>
<div class="form-group">
    <label for="sigla">Sigla:</label>
    <input class="form-control" style="text-transform: uppercase" type="text" name="sigla"  
        value="<?php echo e(isset($servicio->sigla) ? $servicio->sigla:old('sigla')); ?>" id="sigla">
</div>
<div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <textarea class="form-control" type="text" name="descripcion"
        value="" id="descripcion"><?php echo e(isset($servicio->descripcion) ? $servicio->descripcion:old('descripcion')); ?></textarea>
</div>
<div class="form-group">
    <label for="precio">Precio:</label>
    <input class="form-control" type="number"    step="0.01" name="precio"
        value="<?php echo e(isset($servicio->precio) ? $servicio->precio:old('precio')); ?>" id="precio">
</div>
<div class="form-group">
    <label for="costo">Costo:</label>
    <input class="form-control" type="number"    step="0.01" name="costo"
        value="<?php echo e(isset($servicio->costo) ? $servicio->costo:old('costo')); ?>" id="costo">
</div>
<div class="form-group">
    <label for="diferencia">Diferencia:</label>
    <input class="form-control" type="number"    step="0.01" name="diferencia"
        value="<?php echo e(isset($servicio->diferencia) ? $servicio->diferencia:old('diferencia')); ?>" id="diferencia">
</div>

<br>
<input class="btn btn-success" type="submit" value="<?php echo e($modo); ?> servicio">
<a class="btn btn-primary" href="<?php echo e(url('servicio/')); ?>">Volver al Inicio</a>
<br>
<?php /**PATH C:\xampp\htdocs\Changa\resources\views/servicio/form.blade.php ENDPATH**/ ?>