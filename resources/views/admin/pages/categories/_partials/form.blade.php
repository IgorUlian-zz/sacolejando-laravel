@include('admin.includes.alerts')


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="category_name" class="form-control" placeholder="Digite o nome ..." value="{{$category->category_name ?? old('category_name') }}"></input>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="category_desc" class="form-control" placeholder="Digite a Descrição ..." value="{{$category->category_desc ?? old('category_desc') }}"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>