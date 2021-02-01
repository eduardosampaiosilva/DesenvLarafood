  
@extends('adminlte::page')

@section('title', 'Cadastro Novo Plano')

@section('content_header')
    <h1>Cadastrar Novo Plano!!</h1> 
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nome Plano:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome do Plano:">
                </div>
                <div class="form-group">
                    <label>Preço Plano:</label>
                    <input type="number" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="any" name="price" class="form-control" placeholder="Valor do Plano:" >
                </div>
                <div class="form-group">
                    <label>Descrição Plano:</label>
                    <input type="text" name="description" class="form-control" placeholder="Descrição Plano:" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark"> Salvar</button>  <button type="reset" class="btn btn-dark">Limpar Dados</button>  <a href="{{route('plans.index')}}" class="btn btn-dark">Voltar</a>
                </div>
            </form>
        </div>
    </div>
@endsection