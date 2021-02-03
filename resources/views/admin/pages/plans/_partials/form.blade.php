@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome Plano:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome do Plano:" value="{{$plans->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>Preço Plano:</label>
    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" name="price" class="form-control" placeholder="Valor do Plano:" value="{{$plans->price ?? old('price') }}">
</div>
<div class="form-group">
    <label>Descrição Plano:</label>
    <input type="text" name="description" class="form-control" placeholder="Descrição Plano:" value="{{$plans->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark"> Salvar</button>  <button type="reset" class="btn btn-dark">Limpar Dados</button>  <a href="{{route('plans.index')}}" class="btn btn-dark">Voltar</a>
</div>