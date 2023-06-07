

<?php $__env->startSection('title', "Cargos do usuário {$user->user_name}"); ?>
<?php $__env->startSection('content_header'); ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('users.index')); ?>">Usuários</a></li>

</ol>

<h1>Cargos do usuário: <strong><?php echo e($user->user_name); ?></strong></h1>

<a href="<?php echo e(route('users.roles.available', $user->id)); ?>" class="btn btn-dark">ADD NOVO CARGO</a>



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
                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($role->role_name); ?>

                            </td>
                            <td style="width: 10px;">
                                <a href="<?php echo e(route('users.role.detach', [$user->id, $role->id])); ?>" class="btn btn-danger">DESVINCULAR</a>
                                
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <?php if(isset($filters)): ?>
            <?php echo $roles->appends($filters)->links(); ?>


            <?php else: ?>
            <?php echo $roles->links(); ?>


            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/users/roles/roles.blade.php ENDPATH**/ ?>