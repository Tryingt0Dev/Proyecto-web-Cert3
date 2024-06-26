<?php $__env->startSection('content'); ?>
    <div class="container">
        <h1>Mis Órdenes</h1>
        <ul>
            <?php $__currentLoopData = $ordenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>Orden #<?php echo e($orden->id); ?> - <?php echo e($orden->created_at); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\krlos\Documents\Proyecto-web-Cert3\resources\views/ordenes/index.blade.php ENDPATH**/ ?>