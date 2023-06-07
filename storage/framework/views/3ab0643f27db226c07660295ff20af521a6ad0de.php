<?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="mb-6">
    <label class="flex flex-col block">
        <span class=""> Atualize o Status:       </span>
        <select class="block w-full mt-1" name="order_status">
            <option value="Aguardando" <?php if($order->order_status == 'Aguardando'): echo 'selected'; endif; ?>>Aguardando</option>
            <option value="Aprovado" <?php if($order->order_status == 'Aprovado'): echo 'selected'; endif; ?>>Aprovado</option>
            <option value="Produzindo" <?php if($order->order_status == 'Produzindo'): echo 'selected'; endif; ?>>Produzindo</option>
            <option value="Rota de Entrega" <?php if($order->order_status == 'Rota de Entrega'): echo 'selected'; endif; ?>>Rota de Entrega</option>
            <option value="Finalizado" <?php if($order->order_status == 'Finalizado'): echo 'selected'; endif; ?>>Finalizado</option>
        </select>
    </label>
    <span class=""> Atualize o método de Pagamento:           </span>
    <select class="block w-full mt-1" name="payment">
        <option value="Maquina Móvel" <?php if($order->payment == 'Maquina Móvel'): echo 'selected'; endif; ?>>Maquina Móvel</option>
        <option value="QRcode no Local" <?php if($order->payment == 'QRcode no Local'): echo 'selected'; endif; ?>>QRcode no Local</option>
        <option value="Pix no Local" <?php if($order->payment == 'Pix no Local'): echo 'selected'; endif; ?>>Pix no Local</option>
        <option value="Dinheiro" <?php if($order->payment == 'Dinheiro'): echo 'selected'; endif; ?>>Dinheiro</option>
    </select>
    <div class="form-group">
        <label>Endereço: </label>
        <input type="text" name="adress" class="form-control" placeholder="Digite um endereço ..." value="<?php echo e($order->adress ?? old('adress')); ?>"></input>
    </div>
    
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div><?php /**PATH C:\xampp\htdocs\projeto_rest_api_laravel\api_sacolejando\resources\views/admin/pages/orders/_partials/form.blade.php ENDPATH**/ ?>