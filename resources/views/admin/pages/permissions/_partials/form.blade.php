@include('admin.includes.alerts')


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="permission_name" class="form-control" placeholder="Digite o nome ..." value="{{$permissions->permission_name ?? old('profile_name') }}"></input>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="permission_desc" class="form-control" placeholder="Digite a Descrição ..." value="{{$permissions->profile_desc ?? old('permission_desc') }}"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>



