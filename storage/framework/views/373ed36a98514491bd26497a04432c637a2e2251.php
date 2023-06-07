

<?php $__env->startSection('title', "Detalhes da Enmpresa {$tenant->tenant_name}"); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Detalhes</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <ul>
                <li>plano
                    <strong>Name: </strong> <?php echo e($tenant->plan->plan_name); ?>

                </li>
                <li>
                    <strong>Name: </strong> <?php echo e($tenant->tenant_name); ?>

                </li>
                <li>
                    <strong>CNPJ: </strong> <?php echo e($tenant->tenant_cnpj); ?>

                </li>
                <li>
                    <strong>Email: </strong> <?php echo e($tenant->tenant_email); ?>

                </li>
                <li>
                    <strong>Contato: </strong> <?php echo e($tenant->contact); ?>

                </li>
                <li>
                    <strong>Ativo: </strong> <?php echo e($tenant->active == 'Y' ? 'SIM' : 'NÃO'); ?>

                </li>
            </ul>

            <hr>
            <ul>
                <li>
                    <strong>Data de Ativação: </strong> <?php echo e($tenant->subscription); ?>

                </li>
                <li>
                    <strong>Data de Expiração: </strong> <?php echo e($tenant->expires_at); ?>

                </li>
                <li>
                    <strong>Identificador: </strong> <?php echo e($tenant->subscription_id); ?>

                </li>
                <li>
                    <strong>Data de Expiração: </strong> <?php echo e($tenant->expires_at); ?>

                </li>
                <li>
                    <strong>Inscrição ativa: </strong> <?php echo e($tenant->subscription_active == 'Y' ? 'SIM' : 'NÃO'); ?>

                </li>
                <li>
                    <strong>Inscrição cancelada: </strong> <?php echo e($tenant->subscription_suspended == 'Y' ? 'SIM' : 'NÃO'); ?>

                </li>
            </ul>
            <form action="<?php echo e(route('tenants.delete', $tenant->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn btn-danger">DELETAR</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/tenants/details.blade.php ENDPATH**/ ?>