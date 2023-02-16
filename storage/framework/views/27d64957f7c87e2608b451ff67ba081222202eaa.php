<h1><?php echo e($modo); ?> Producto</h1>

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
        value="<?php echo e(isset($producto->nombre) ? $producto->nombre:old('nombre')); ?>" id="nombre">
</div>
<div class="form-group">
    <label for="precio">Precio:</label>
    <input class="form-control" type="number"    step="0.01" name="precio"
        value="<?php echo e(isset($producto->precio) ? $producto->precio:old('precio')); ?>" id="precio">
</div>
<div class="form-group">
    <label for="costo">Costo:</label>
    <input class="form-control" type="number"    step="0.01" name="costo"
        value="<?php echo e(isset($producto->costo) ? $producto->costo:old('costo')); ?>" id="costo">
</div>
<div class="form-group">
    <label for="existencia">existencia:</label>
    <input class="form-control" type="number"    step="0.01" name="existencia"
        value="<?php echo e(isset($producto->existencia) ? $producto->existencia:old('existencia')); ?>" id="existencia">
</div>
<div class="form-group">
    <label for="descuento">descuento:</label>
    <input class="form-control" type="number"    step="0.01" name="descuento"
        value="<?php echo e(isset($producto->descuento) ? $producto->descuento:old('descuento')); ?>" id="descuento">
</div>
<div class="form-group">
    <label for="id_categoria">id_categoria:</label>
    <input class="form-control" type="number"    step="0.01" name="id_categoria"
        value="<?php echo e(isset($producto->id_categoria) ? $producto->id_categoria:old('id_categoria')); ?>" id="id_categoria">
</div>


<br>
<input class="btn btn-success" type="submit" value="<?php echo e($modo); ?> producto">
<a class="btn btn-primary" href="<?php echo e(url('producto/')); ?>">Volver al Inicio</a>
<br>
<?php /**PATH C:\xampp\htdocs\Changa\resources\views/producto/form.blade.php ENDPATH**/ ?>