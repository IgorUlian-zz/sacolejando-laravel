

<?php $__env->startSection('title', "Permissões do Perfil {$role->role_name}"); ?>
<?php $__env->startSection('content_header'); ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('roles.index')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('roles.index')); ?>">Permissões</a></li>

</ol>

<h1>Permissões do perfil <strong><?php echo e($role->role_name); ?></strong></h1>

<a href="<?php echo e(route('roles.permissions.available', $role->id)); ?>" class="btn btn-dark">ADD NOVA PERMISSÃO</a>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th width="50">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($permission->permission_name); ?>

                            </td>
                            <td style="width: 10px;">
                                <a href="<?php echo e(route('roles.permission.detach', [$role->id, $permission->id])); ?>" class="btn btn-danger">DESVINCULAR</a>
                                
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <?php if(isset($filters)): ?>
            <?php echo $permissions->appends($filters)->links(); ?>


            <?php else: ?>
            <?php echo $permissions->links(); ?>


            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/roles/permissions/permissions.blade.php ENDPATH**/ ?>