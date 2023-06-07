<?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="plan_name" class="form-control" placeholder="Digite o nome ..." value="<?php echo e($plan->plan_name ?? old('plan_name')); ?>"></input>
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="plan_price" class="form-control" placeholder="Digite o Preço ... " value="<?php echo e($plan->plan_price ?? old('plan_price')); ?>"></input>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="plan_desc" class="form-control" placeholder="Digite a Descrição ..." value="<?php echo e($plan->plan_desc ?? old('plan_desc')); ?>"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/plans/_partials/form.blade.php ENDPATH**/ ?>