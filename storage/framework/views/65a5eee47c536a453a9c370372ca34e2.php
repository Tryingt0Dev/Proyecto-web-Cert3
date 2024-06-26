<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($libro->stock > 0): ?>
                            <div class="col-md-3 mb-4">
                                <div class="card shadow-sm">
                                    <?php if($libro->imagen): ?>
                                        <img src="<?php echo e(Storage::url($libro->imagen)); ?>" class="card-img-top" alt="<?php echo e($libro->titulo); ?>">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('storage/imagenes/default.png')); ?>" class="card-img-top" alt="Imagen por defecto">
                                    <?php endif; ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo e($libro->titulo); ?></h5>
                                        <p class="card-text"><?php echo e($libro->descripcion); ?></p>
                                        <p class="card-text">Stock: <?php echo e($libro->stock); ?></p>
                                        <form method="POST" action="<?php echo e(route('checkout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <button class="btn btn-primary btn-block mb-2" type="submit">Comprar</button>
                                        </form>
                                        <form action="<?php echo e(route('carrito.add', $libro->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn btn-success btn-block">Agregar al carrito</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\krlos\Documents\Proyecto-web-Cert3\resources\views/home.blade.php ENDPATH**/ ?>