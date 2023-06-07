

<?php $__env->startSection('title', "Detalhes do Plano {$plan->plan_name}"); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Detalhes</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Url: </strong> <?php echo e($plan->url); ?>

                </li>
                <li>
                    <strong>Name: </strong> <?php echo e($plan->plan_name); ?>

                </li>
                <li>
                    <strong>Preço: </strong> <?php echo e(number_format($plan->plan_price, 2, ',', '.')); ?>

                </li>
                <li>
                    <strong>Descrição: </strong> <?php echo e($plan->plan_desc); ?>

                </li>
            </ul>
            <form action="<?php echo e(route('plans.delete', $plan->url)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/plans/details.blade.php ENDPATH**/ ?>