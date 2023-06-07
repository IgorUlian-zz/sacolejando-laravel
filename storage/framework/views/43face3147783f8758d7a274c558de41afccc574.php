

<?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->startSection('title', "Categorias do alimento {$food->title}"); ?>

<?php $__env->startSection('content_header'); ?>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('foods.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('foods.index')); ?>">Alimentos</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo e(route('foods.categories', $food->id)); ?>" class="active">Categorias</a></li>
    </ol>

    <h1>Categorias do alimento <strong><?php echo e($food->title); ?></strong></h1>

    <a href="<?php echo e(route('foods.categories.available', $food->id)); ?>" class="btn btn-dark">ADD NOVA CATEGORIA</a>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($category->category_name); ?>

                            </td>
                            <td style="width=10px;">
                                <a href="<?php echo e(route('foods.category.detach', [$food->id, $category->id])); ?>" class="btn btn-danger">DESVINCULAR</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/foods/categories/categories.blade.php ENDPATH**/ ?>