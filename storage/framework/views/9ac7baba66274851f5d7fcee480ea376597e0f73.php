

<?php $__env->startSection('title', 'Alimentos'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Alimentos <a href="<?php echo e(route('foods.create')); ?>" class="btn btn-dark">ADD</a></h1>

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo e(route('foods.index')); ?>">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="<?php echo e(route('foods.index')); ?>">Alimentos</a></li>

</ol>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <form action=" <?php echo e(route('foods.search')); ?>" method="POST" class="form form-inline">
                <?php echo csrf_field(); ?>
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="<?php echo e($filters['food_name'] ?? ''); ?>">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="100">Imagem</th>

                        <th>
                            Nome
                        </th>
                        <th>
                            Preço
                        </th>
                        <th width="200">
                            Ações
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $foods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $food): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <img src="<?php echo e(url("storage/{$food->image}")); ?>" style="max-width: 90px;">

                            </td>
                            <td>
                                <?php echo e($food->food_name); ?>

                            </td>
                            <td>
                                <?php echo e($food->price); ?>

                            </td>
                            <td style="width: 10px;">
                                <a href="<?php echo e(route('foods.edit', $food->id)); ?>" class="btn btn-warning">EDITAR</a>
                                <a href="<?php echo e(route('foods.categories', $food->id)); ?>" class="btn btn-info" title="Categorias"><i class="fas fa-layer-group"></i></a>
                                <a href="<?php echo e(route('foods.details', $food->id)); ?>" class="btn btn-success">VER</a>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <?php if(isset($filters)): ?>
                <?php echo $foods->appends($filters)->links(); ?>

            <?php else: ?>
                <?php echo $foods->links(); ?>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/foods/index.blade.php ENDPATH**/ ?>