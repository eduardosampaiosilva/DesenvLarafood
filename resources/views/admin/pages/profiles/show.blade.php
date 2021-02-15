  
@extends('adminlte::page')

@section('title', 'Detalhes Perfil')

@section('content_header')
    <h1>Detalhes do Perfil ( <b>{{ $profiles->name }} )</b> </h1> 
@stop

@section('content')
    <div class="card">        
        <div class="card-body">
        <ul>    
            <li>
                <strong>Nome:</strong> {{ $profiles->name }}
            </li>
            <li>
                <strong>Descrição:</strong> {{ $profiles->description }}
            </li>                        
        </ul>        
        </div>        
    </div>    
    
    @include('admin.includes.alerts')<!-- Aqui da os alerta caso já tenha algum detalhe cadastrado !-->

    <form action="{{route('profiles.destroy',$profiles->id)}}" method="POST">        

        @csrf
        @method('DELETE')

        <div class="form-group" >
                <a href="{{ route('profiles.index') }}" class="btn btn-dark"><i class="far fa-hand-point-left"></i> Voltar</a>                 
                <button type="submit" class="btn btn-danger"> <i class="far fa-trash-alt"></i> Deletar Perfil( {{$profiles->name }})</button>
        </div>        
    </form>
@endsection