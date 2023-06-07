@include('admin.includes.alerts')


<div class="mb-6">
    <label class="flex flex-col block">
        <span class=""> Atualize o Status:       </span>
        <select class="block w-full mt-1" name="order_status">
            <option value="Aguardando" @selected($order->order_status == 'Aguardando')>Aguardando</option>
            <option value="Aprovado" @selected($order->order_status == 'Aprovado')>Aprovado</option>
            <option value="Produzindo" @selected($order->order_status == 'Produzindo')>Produzindo</option>
            <option value="Rota de Entrega" @selected($order->order_status == 'Rota de Entrega')>Rota de Entrega</option>
            <option value="Finalizado" @selected($order->order_status == 'Finalizado')>Finalizado</option>
        </select>
    </label>
    <span class=""> Atualize o método de Pagamento:           </span>
    <select class="block w-full mt-1" name="payment">
        <option value="Maquina Móvel" @selected($order->payment == 'Maquina Móvel')>Maquina Móvel</option>
        <option value="QRcode no Local" @selected($order->payment == 'QRcode no Local')>QRcode no Local</option>
        <option value="Pix no Local" @selected($order->payment == 'Pix no Local')>Pix no Local</option>
        <option value="Dinheiro" @selected($order->payment == 'Dinheiro')>Dinheiro</option>
    </select>
    <div class="form-group">
        <label>Endereço: </label>
        <input type="text" name="adress" class="form-control" placeholder="Digite um endereço ..." value="{{$order->adress ?? old('adress') }}"></input>
    </div>
    
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>