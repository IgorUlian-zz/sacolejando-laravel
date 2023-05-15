@include('admin.includes.alerts')


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="role_name" class="form-control" placeholder="Digite o nome ..." value="{{$roles->role_name ?? old('role_name') }}"></input>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="role_desc" class="form-control" placeholder="Digite a Descrição ..." value="{{$roles->role_desc ?? old('role_desc') }}"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>



