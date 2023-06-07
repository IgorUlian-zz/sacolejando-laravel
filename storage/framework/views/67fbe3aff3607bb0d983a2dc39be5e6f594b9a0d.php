

<?php $__env->startSection('title', "Permissões do Perfil {$profile->profile_name}"); ?>

<?php $__env->startSection('content_header'); ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('profiles.index')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('profiles.index')); ?>">Permissões</a></li>

</ol>

<h1>Permissões disponíveis no perfil: <strong><?php echo e($profile->profile_name); ?></strong></h1>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <form action=" <?php echo e(route('profiles.permissions.available', $profile->id)); ?>" method="POST" class="form form-inline">
                <?php echo csrf_field(); ?>
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="<?php echo e($filters['filter'] ?? ''); ?>">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?php echo e(route('profiles.permissions.attach', $profile->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="<?php echo e($permission->id); ?>">
                            </td>
                            <td>
                                <?php echo e($permission->permission_name); ?>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td colspan="500">
                            <?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <button type="submit" class="btn btn-success">Vincular</button>
                        </td>
                    </tr>
                    </form>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/profiles/permissions/available.blade.php ENDPATH**/ ?>