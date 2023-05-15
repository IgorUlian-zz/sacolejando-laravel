@include('admin.includes.alerts')


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="food_name" class="form-control" placeholder="Digite o nome ..." value="{{$food->food_name ?? old('food_name') }}"></input>
</div>
<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="food_price" class="form-control" placeholder="Digite o preço ..." value="{{$food->food_price ?? old('food_price') }}"></input>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="food_desc" class="form-control" placeholder="Digite a Descrição ..." value="{{$food->food_desc ?? old('food_desc') }}"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>