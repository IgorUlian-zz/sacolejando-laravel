<?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="form-group">
    <label>Imagem*:</label>
    <input type="file" name="image" class="form-control">
</div>
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="food_name" class="form-control" placeholder="Digite o nome ..." value="<?php echo e($food->food_name ?? old('food_name')); ?>"></input>
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Digite o preço ..." value="<?php echo e($food->price ?? old('food_price')); ?>"></input>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="food_desc" class="form-control" placeholder="Digite a Descrição ..." value="<?php echo e($food->food_desc ?? old('food_desc')); ?>"></input>
</div>
<div class="form-group">
    <label>Ingredientes:</label>
    <input type="text" name="ingredients" class="form-control" placeholder="Digite os Ingredientes ..." value="<?php echo e($food->ingredients ?? old('ingredients')); ?>"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/foods/_partials/form.blade.php ENDPATH**/ ?>