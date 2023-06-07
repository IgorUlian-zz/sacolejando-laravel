@include('admin.includes.alerts')


<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Digite o nome ..." value="{{$users->name ?? old('name') }}"></input>
</div>
<div class="form-group">
    <label>Email:</label>
    <input type="text" name="email" class="form-control" placeholder="Digite o Email ..." value="{{$users->email ?? old('email') }}"></input>
</div>
<div class="form-group">
    <label>Senha:</label>
    <input type="text" name="password" class="form-control" placeholder="Digite a senha ..." value="{{$users->password ?? old('password') }}"></input>
</div>
<div class="form-group">
    <label>Contato:</label>
    <input type="text" name="contact" class="form-control" placeholder="Digite um contato ..." value="{{$users->contact ?? old('contact') }}"></input>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Gravar</button>
</div>



