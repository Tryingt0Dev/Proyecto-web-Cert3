<?php $__env->startSection('content'); ?>
<div class="form-register">
    <h2>Solicitar un libro</h2>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('pedidos.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar Pedido</button>
    </form>

    
</div>
<div class="form-group">
    <img src="<?php echo e(asset('storage/imagenes/pedidolibro.png')); ?>" alt="logo soli" style="height: 40px ;">
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\krlos\Documents\Proyecto-web-Cert3\resources\views/pedidos/create.blade.php ENDPATH**/ ?>