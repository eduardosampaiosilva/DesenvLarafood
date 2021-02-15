@csrf
@include('admin.includes.alerts')
<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" placeholder="Digite o Nome do Plano" class="form-control" value="{{ $detail->name ?? old('name') }}"> 
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark"> Salvar Detalhes</button>
</div>
