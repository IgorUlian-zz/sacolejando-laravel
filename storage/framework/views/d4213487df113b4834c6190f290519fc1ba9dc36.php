

<?php $__env->startSection('title', 'Pedidos'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Pedidos</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('orders.index')); ?>" class="active">Pedidos</a></li>
    </ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
                <?php echo csrf_field(); ?>
                <form action=" <?php echo e(route('orders.search')); ?>" method="POST" class="form form-inline">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="filter" placeholder="Nome" class="form-control" value="<?php echo e($filters['identify'] ?? ''); ?>">
                    <button type="submit" class="btn btn-dark">Filtrar</button>
                </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Código
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            Data
                        </th>
                        <th width="300">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($order->identify); ?>

                            </td>
                            <td>
                                <?php echo e($order->order_status); ?>

                            </td>
                            <td>
                                <?php echo e($order->created_at); ?>

                            </td>
                            <td style="width: 10px;">
                                <a href="<?php echo e(route('orders.edit', $order->id)); ?>"class="btn btn-warning">EDITAR</a>
                                <a href="<?php echo e(route('orders.details', $order->id)); ?>" class="btn btn-info">DETALHES</a>
                                <a href="<?php echo e(route('orders.foodDetails', $order->identify)); ?>" class="btn btn-success">ITENS</a>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/orders/index.blade.php ENDPATH**/ ?>