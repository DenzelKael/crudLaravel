<h1><?php echo e($modo); ?> Registro de Importacion de Archivo</h1>

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
    <input  class="form-control" style="text-transform: uppercase" type="text" name="nombre"  
        value="<?php echo e(isset($archivo->nombre) ? $producto->nombre:old('nombre')); ?>" id="nombre" placeholder="<?php echo e(now()); ?>">

</div>

<div class="form-group">
    <label for="fecha">Fecha:</label>
    <input class="form-control" type="date" name="fecha"
        value="<?php echo e(isset($archivo->fecha) ? $archivo->fecha:old('fecha')); ?>" id="fecha">
</div>
<div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <textarea placeholder="Ingrese una descripcion" class="form-control" type="number" name="descripcion"
        value="<?php echo e(isset($archivo->descripcion) ? $archivo->descripcion:old('descripcion')); ?>" id="descripcion"></textarea>
</div>
<div class="form-group">
    <label for="archivo">Archivo de Excel:</label>
    <?php if(isset($archivo->archivo)): ?>
        <img class="img-thumbnail img-fluid" src="<?php echo e(asset('storage') . '/' . $archivo->archivo); ?>" width="100"
            alt="" srcset="">
    <?php endif; ?>
    <input type="file" class="form-control" name="archivo" value="" id="archivo">
</div>
<br>
<input class="btn btn-success" type="submit" value="Importar archivo">
<a class="btn btn-primary" href="<?php echo e(url('producto/')); ?>">Volver al Inicio</a>
<br>
<script src="<?php echo e(asset("js/importar.js")); ?>"></script><?php /**PATH C:\xampp\htdocs\Changa\resources\views/importar/form.blade.php ENDPATH**/ ?>