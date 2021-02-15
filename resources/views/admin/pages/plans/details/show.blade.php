  
@extends('adminlte::page')

@section('title', 'Análise dos Detalhes do Plano')

@section('content_header')
    <h1>Detalhe ( <b>{{ $detail->name }} )</b> </h1> 
@stop

@section('content')
    <div class="card">        
        <div class="card-body">        
        <ul>    
            <li>
                <strong>Nome:</strong> {{ $detail->name }}
            </li>                        
        </ul>        
        </div>        
    </div>    
    <form action="{{route('details.plan.destroy',[$plan->url, $detail->id])}}" method="POST">        

        @csrf
        @method('DELETE')

        <div class="form-group" >
                <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-dark"><i class="far fa-hand-point-left"></i> Voltar</a>                 
                <button type="submit" class="btn btn-danger"> <i class="far fa-trash-alt"></i> Deletar Detalhe ( {{$detail->name }})</button>
        </div>        
    </form>
@endsection