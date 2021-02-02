  
@extends('adminlte::page')

@section('title', 'Detalhes Plano')

@section('content_header')
    <h1>Detalhes do Plano ( <b>{{ $plan->name }} )</b> </h1> 
@stop

@section('content')
    <div class="card">        
        <div class="card-body">
        <ul>    
            <li>
                <strong>Nome:</strong> {{ $plan->name }}
            </li>
            <li>
                <strong>url:</strong> {{ $plan->url }}
            </li>
            <li>
                <strong>Preço:</strong> R$ {{number_format($plan->price, 2 ,',','.') }}
            </li>
            <li>
                <strong>Descrição Plano:</strong> {{ $plan->description }}
            </li>            
        </ul>        
        </div>        
    </div>    
    <form action="{{route('plans.destroy',$plan->url)}}" method="POST">        

        @csrf
        @method('DELETE')

        <div class="form-group" >
                <a href="{{ route('plans.index') }}" class="btn btn-dark"><i class="far fa-hand-point-left"></i> Voltar</a>                 
                <button type="submit" class="btn btn-danger"> <i class="far fa-trash-alt"></i> Deletar Plano( {{$plan->name }})</button>
        </div>        
    </form>
@endsection