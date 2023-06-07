

<?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('food_name', 'Categorias disponíveis para o alimento {$food->food_name}'); ?>

<?php $__env->startSection('content_header'); ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('foods.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('foods.index')); ?>">Alimento</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('foods.categories', $food->id)); ?>">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('foods.categories.available', $food->id)); ?>" class="active">Disponíveis</a></li>
    </ol>

    <h1>Categorias disponíveis para o alimento <strong><?php echo e($food->food_name); ?></strong></h1>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <form action="<?php echo e(route('foods.categories.available', $food->id)); ?>" method="POST" class="form form-inline">
                <?php echo csrf_field(); ?>
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="<?php echo e($filters['filter'] ?? ''); ?>">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="<?php echo e(route('foods.categories.attach', $food->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="categories[]" value="<?php echo e($category->id); ?>">
                                </td>
                                <td>
                                    <?php echo e($category->category_name); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td colspan="500">
                                <?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>
                    </form>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <?php if(isset($filters)): ?>
                <?php echo $categories->appends($filters)->links(); ?>

            <?php else: ?>
                <?php echo $categories->links(); ?>

            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/foods/categories/available.blade.php ENDPATH**/ ?>