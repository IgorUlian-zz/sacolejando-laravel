<?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Digite o nome ..." value="<?php echo e($users->name ?? old('name')); ?>"></input>
</div>
<div class="form-group">
    <label>Email:</label>
    <input type="text" name="email" class="form-control" placeholder="Digite o Email ..." value="<?php echo e($users->email ?? old('email')); ?>"></input>
</div>
<div class="form-group">
    <label>Senha:</label>
    <input type="text" name="password" class="form-control" placeholder="Digite a senha ..." value="<?php echo e($users->password ?? old('password')); ?>"></input>
</div>
<div class="form-group">
    <label>Contato:</label>
    <input type="text" name="contact" class="form-control" placeholder="Digite um contato ..." value="<?php echo e($users->contact ?? old('contact')); ?>"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>



<?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/users/_partials/form.blade.php ENDPATH**/ ?>