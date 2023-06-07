

<?php $__env->startSection('title', "Detalhes do pedido {$order->identify}"); ?>

<?php $__env->startSection('content_header'); ?>

<h1>Detalhes do Pedido: <?php echo e($order->identify); ?></h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Status: </strong> <?php echo e($order->order_status); ?>

                </li>
                <li>
                    <strong>Código: </strong> <?php echo e($order->identify); ?>

                </li>
                <li>
                    <strong>Empresa: </strong> <?php echo e($order->tenant->tenant_name); ?>

                </li>
                <li>
                    <strong>Cliente: </strong> <?php echo e($order->client->client_name); ?>

                </li>
                <li>
                    <strong>Email: </strong> <?php echo e($order->client->client_email); ?>

                </li>
                <li>
                    <strong>Contato Cliente: </strong> <?php echo e($order->client->contact); ?>

                </li>
                <li>
                    <strong>Endereço de entrega: </strong> <?php echo e($order->adress); ?>

                </li>
                <li>
                    <strong>Data: </strong> <?php echo e($order->created_at); ?>

                </li>
                <li>
                    <strong>Comentário: </strong> <?php echo e($order->comments); ?>

                </li>
                <li>
                    <strong>Opção de pagamento: </strong> <?php echo e($order->payment); ?>

                </li>
                <li>
                    <strong>TOTAL A PAGAR: </strong> <?php echo e($order->total); ?>

                </li>
                <br>
            </br>

                <tbody>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/orders/details.blade.php ENDPATH**/ ?>