<?php $__env->startSection('content'); ?>
    <div class="form-register">
        <h1>Asignar rol</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(Auth::check() && Auth::user()->role === 'admin'): ?>
            <form method="POST" action="<?php echo e(route('rol')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="user_id">Usuario</label>
                    <select id="user_id" name="user_id" class="form-control" required>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="role">Rol</label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="user">Usuario</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Asignar rol</button>
            </form>
        <?php else: ?>
            <p>No tienes permisos de administrador.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\krlos\Documents\Proyecto-web-Cert3\resources\views/admin/rol.blade.php ENDPATH**/ ?>