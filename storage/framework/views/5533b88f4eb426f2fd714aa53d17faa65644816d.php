<h1><?php echo e($modo); ?> Extracto Bancario</h1>

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
    <input class="form-control"  type="text" name="nombre"
        value="<?php echo e(isset($archivo->nombre) ? $archivo->nombre : old('nombre')); ?>" id="nombre" placeholder="Haz click!">

</div>

<div class="form-group d-flex row justify-content-between">
    <div class="form-group flex-fill col-5">
        <label for="fecha">Fecha:</label>
        <input class="form-control" type="date" name="fecha"
            value="<?php echo e(isset($archivo->fecha) ? $archivo->fecha : old('fecha')); ?>" id="fecha">
    </div>
    <div class="form-group flex-fill col-5">
        <label for="descripcion">Seleccione Plataforma Bancaria:</label><br>
        <select name="id_plataforma" id="descripcion">
        <?php $__currentLoopData = $plataformas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plataforma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option  value="<?php echo e($plataforma->id); ?>" name="<?php echo e($plataforma->nombre); ?>"><?php echo e($plataforma->nombre); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </select>
    </div>
</div>
<div class="form-group">
    <label for="archivo">Archivo de Excel:</label>

    <input type="file" class="form-control" name="archivo" value="" id="archivo">
</div>
<br>
<input class="btn btn-success" type="submit" value="<?php echo e($modo); ?> archivo">
<a class="btn btn-danger" href="<?php echo e(url('archivo/')); ?>">Cancelar</a>
<br>
<script src="<?php echo e(asset('js/archivo.js')); ?>"></script>
<?php /**PATH C:\xampp\htdocs\Changa\resources\views/archivo/form.blade.php ENDPATH**/ ?>