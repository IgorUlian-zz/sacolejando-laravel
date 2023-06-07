

<?php $__env->startSection('title', "Perfis com o Plano: {$plan->plan_name}"); ?>
<?php $__env->startSection('content_header'); ?>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('plans.index')); ?>">Planos</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('plans.profiles', $plan->id)); ?>" class="active">Perfis</a></li>
</ol>

<h1>Perfis do plano <strong><?php echo e($plan->plan_name); ?></strong></h1>

<a href="<?php echo e(route('plans.profiles.available', $plan->id)); ?>" class="btn btn-dark">ADD NOVO PERFIL</a>



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
                    <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($profile->profile_name); ?>

                            </td>
                            <td style="width: 10px;">
                                <a href="<?php echo e(route('plans.profiles.detach', [$plan->id, $profile->id])); ?>" class="btn btn-danger">DESVINCULAR</a>
                                
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <?php if(isset($filters)): ?>
            <?php echo $profiles->appends($filters)->links(); ?>


            <?php else: ?>
            <?php echo $profiles->links(); ?>


            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/plans/profiles/profiles.blade.php ENDPATH**/ ?>