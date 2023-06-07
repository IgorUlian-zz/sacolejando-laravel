

<?php $__env->startSection('title', "Detalhes da Permissão {$permission->permission_name}"); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Detalhes</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Name: </strong> <?php echo e($permission->permission_name); ?>

                </li>
                <li>
                    <strong>Descrição: </strong> <?php echo e($permission->permission_desc); ?>

                </li>
            </ul>
            <form action="<?php echo e(route('permissions.delete', $permission->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/permissions/details.blade.php ENDPATH**/ ?>