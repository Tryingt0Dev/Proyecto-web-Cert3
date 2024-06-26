<?php $__env->startSection('content'); ?>
<div class="container kolor">
    <h2>Pedidos de Libros</h2>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <table class="table ">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <?php if(auth()->user() && auth()->user()->role === 'admin'): ?>
                    <th>Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody >
            <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($pedido->titulo); ?></td>
                    <td><?php echo e($pedido->autor); ?></td>
                    <td><?php echo e($pedido->user ? $pedido->user->name : 'Usuario no disponible'); ?></td>
                    <td><?php echo e($pedido->created_at->format('d/m/Y')); ?></td>
                    <?php if(auth()->user() && auth()->user()->role === 'admin'): ?>
                        <td>
                            <form action="<?php echo e(route('pedidos.destroy', $pedido->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\krlos\Documents\Proyecto-web-Cert3\resources\views/pedidos/index.blade.php ENDPATH**/ ?>