<?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="<?php echo e($tenant->tenant_name?? old('name')); ?>">
</div>
<div class="form-group">
    <label>* E-mail:</label>
    <input type="email" name="email" class="form-control" placeholder="E-mail:" value="<?php echo e($tenant->tenant_email ?? old('email')); ?>">
</div>
<div class="form-group">
    <label>* CNPJ:</label>
    <input type="number" name="cnpj" class="form-control" placeholder="CNPJ:" value="<?php echo e($tenant->cnpj ?? old('cnpj')); ?>">
</div>
<div class="form-group">
    <label>* CONTATO:</label>
    <input type="number" name="cnpj" class="form-control" placeholder="CONTATO:" value="<?php echo e($tenant->contact ?? old('contact')); ?>">
</div>

<div class="form-group">
    <label>* Ativo?</label>
    <select name="active" class="form-control">
        <option value="Y" <?php if(isset($tenant) && $tenant->active == 'Y'): ?> selected <?php endif; ?> >SIM</option>
        <option value="N" <?php if(isset($tenant) && $tenant->active == 'N'): ?> selected <?php endif; ?>>Não</option>
    </select>
</div>
<hr>
<h3>Assinatura</h3>
<div class="form-group">
    <label>Data Assinatura (início):</label>
    <input type="date" name="subscription" class="form-control" placeholder="Data Assinatura (início):" value="<?php echo e($tenant->subscription ?? old('subscription')); ?>">
</div>
<div class="form-group">
    <label>Expira (final):</label>
    <input type="date" name="expires_at" class="form-control" placeholder="Expira:" value="<?php echo e($tenant->expires_at ?? old('expires_at')); ?>">
</div>
<div class="form-group">
    <label>Identificador:</label>
    <input type="text" name="subscription_id" class="form-control" placeholder="Identificador:" value="<?php echo e($tenant->subscription_id ?? old('subscription_id')); ?>">
</div>
<div class="form-group">
    <label>* Assinatura Ativa?</label>
    <select name="subscription_active" class="form-control">
        <option value="1" <?php if(isset($tenant) && $tenant->subscription_active): ?> selected <?php endif; ?> >SIM</option>
        <option value="0" <?php if(isset($tenant) && !$tenant->subscription_active): ?> selected <?php endif; ?>>Não</option>
    </select>
</div>
<div class="form-group">
    <label>* Assinatura Cancelada?</label>
    <select name="subscription_suspended" class="form-control">
        <option value="1" <?php if(isset($tenant) && $tenant->subscription_suspended): ?> selected <?php endif; ?> >SIM</option>
        <option value="0" <?php if(isset($tenant) && !$tenant->subscription_suspended): ?> selected <?php endif; ?>>Não</option>
    </select>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/tenants/_partials/form.blade.php ENDPATH**/ ?>