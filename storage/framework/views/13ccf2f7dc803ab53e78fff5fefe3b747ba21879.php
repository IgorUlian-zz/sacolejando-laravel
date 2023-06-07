<?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="permission_name" class="form-control" placeholder="Digite o nome ..." value="<?php echo e($permissions->permission_name ?? old('profile_name')); ?>"></input>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="permission_desc" class="form-control" placeholder="Digite a Descrição ..." value="<?php echo e($permissions->profile_desc ?? old('permission_desc')); ?>"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>



<?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/permissions/_partials/form.blade.php ENDPATH**/ ?>