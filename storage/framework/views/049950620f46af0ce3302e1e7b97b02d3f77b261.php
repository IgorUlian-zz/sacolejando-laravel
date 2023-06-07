

<?php $__env->startSection('title', 'Pedidos'); ?>

<?php $__env->startSection('content_header'); ?>
<h1>Itens</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('orders.index')); ?>" class="active">Pedidos</a></li>
    </ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>
                            Identificador
                        </th>
                        <th>
                            Produto
                        </th>
                        <th>
                            Quantidade
                        </th>
                        <th>
                            Preço
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
                                    <?php echo e($order->food->food_name); ?> 
                                </td>
                                <td>
                                    <?php echo e($order->quantity); ?>

                                </td>
                                <td>
                                    <?php echo e($order->price); ?>,00
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/orders/foodDetails.blade.php ENDPATH**/ ?>