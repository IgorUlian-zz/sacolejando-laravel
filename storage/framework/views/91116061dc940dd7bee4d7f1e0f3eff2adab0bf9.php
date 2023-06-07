

<?php $__env->startSection('title', 'Permissões'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Permissões  <a href="<?php echo e(route('permissions.create')); ?>" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('permissions.index')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('permissions.index')); ?>">Permissões</a></li>

</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <form action=" <?php echo e(route('permissions.search')); ?>" method="POST" class="form form-inline">
                <?php echo csrf_field(); ?>
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="<?php echo e($filters['permission_name'] ?? ''); ?>">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Nome
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th width="250">
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
                            <td>
                                <?php echo e($permission->permission_desc); ?>

                            </td>
                            <td style="width: 10px;">
                                <a href="<?php echo e(route('permissions.edit', $permission->id)); ?>" class="btn btn-warning">EDITAR</a>
                                <a href="<?php echo e(route('permissions.profiles', $permission->id)); ?>" class="btn btn-info"><i class="fas fa-address-book"></i></a>
                                <a href="<?php echo e(route('permissions.details', $permission->id)); ?>" class="btn btn-success">VER</a>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/permissions/index.blade.php ENDPATH**/ ?>