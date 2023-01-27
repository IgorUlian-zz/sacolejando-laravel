@include('admin.includes.alerts')


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="profile_name" class="form-control" placeholder="Digite o nome ..." value="{{$profiles->profile_name ?? old('profile_name') }}"></input>
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="profile_desc" class="form-control" placeholder="Digite a Descrição ..." value="{{$profiles->profile_desc ?? old('profile_desc') }}"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>



