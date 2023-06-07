

<?php $__env->startSection('title', 'Planos'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Planos <a href="<?php echo e(route('plans.create')); ?>" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('plans.index')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('plans.index')); ?>">Planos</a></li>

</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <form action=" <?php echo e(route('plans.search')); ?>" method="POST" class="form form-inline">
                <?php echo csrf_field(); ?>
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="<?php echo e($filters['plan_name'] ?? ''); ?>">
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
                            Preço
                        </th>
                        <th>
                            Descrição
                        </th>
                        <th width="200">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($plan->plan_name); ?>

                            </td>
                            <td>
                                R$ <?php echo e(number_format($plan->price, 2, ',', '.')); ?>

                            </td>
                            <td>
                                <?php echo e($plan->plan_desc); ?>

                            </td>
                            <td style="width: 10px;">
                                <a href="<?php echo e(route('plans.edit', $plan->url)); ?>" class="btn btn-warning">EDITAR</a>
                                <a href="<?php echo e(route('plans.profiles', $plan->id)); ?>" class="btn btn-info" title="Perfis"><i class="fas fa-layer-group"></i></a>
                                <a href="<?php echo e(route('plans.details', $plan->url)); ?>" class="btn btn-success">VER</a>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <?php if(isset($filters)): ?>
                <?php echo $plans->appends($filters)->links(); ?>

            <?php else: ?>
                <?php echo $plans->links(); ?>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/plans/index.blade.php ENDPATH**/ ?>