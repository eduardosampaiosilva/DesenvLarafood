@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome Perfil:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome do Perfil:" value="{{$profiles->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Descrição Plano:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição Plano:" value="{{$profiles->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark"> Salvar</button>  <button type="reset" class="btn btn-dark">Limpar Dados</button>  <a href="{{route('profiles.index')}}" class="btn btn-dark">Voltar</a>
</div>