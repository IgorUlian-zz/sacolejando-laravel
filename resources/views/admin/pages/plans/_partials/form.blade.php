@include('admin.includes.alerts')


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="plan_name" class="form-control" placeholder="Digite o nome ..." value="{{$plan->plan_name ?? old('plan_name') }}"></input>
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="plan_price" class="form-control" placeholder="Digite o Preço ... " value="{{$plan->plan_price ?? old('plan_price') }}"></input>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="plan_desc" class="form-control" placeholder="Digite a Descrição ..." value="{{$plan->plan_desc ?? old('plan_desc') }}"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>