@include('admin.includes.alerts')


<div class="mb-6">
    <label class="flex flex-col block">
        <span class=""> Select Status: </span>
        <select class="block w-full mt-1" name="order_status">
            <option value="Aguardando" @selected($order->order_status == 'Aguardando')>Aguardando</option>
        </select>
    </label>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>