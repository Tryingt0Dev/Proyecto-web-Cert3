<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><?php echo e(__('Libros')); ?></div>

                    <div class="card-body kolor">
                        <a href="<?php echo e(route('libros.agregar')); ?>" class="btn btn-primary mb-3">Agregar Libro</a>

                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <table class="table kolor">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Descripción</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($libro->id); ?></td>
                                        <td><?php echo e($libro->titulo); ?></td>
                                        <td><?php echo e($libro->autor); ?></td>
                                        <td><?php echo e($libro->descripcion); ?></td>
                                        <td><?php echo e($libro->stock); ?></td>
                                        <td><?php echo e($libro->precio); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('libros.edit', $libro->id)); ?>" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="<?php echo e(route('libros.destroy', $libro->id)); ?>" method="POST" style="display:inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\krlos\Documents\Proyecto-web-Cert3\resources\views/libros/index.blade.php ENDPATH**/ ?>