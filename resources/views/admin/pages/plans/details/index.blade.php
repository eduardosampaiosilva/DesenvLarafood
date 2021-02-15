  
@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <h1>Planos </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"> <a href="{{ route('plans.index') }}">Planos</a></li>
        <li class="breadcrumb-item"> <a href="{{ route('plans.show',$plan->url) }}">{{$plan->name}}</a></li>
        <li class="breadcrumb-item active" > <a href="{{ route('details.plan.index', $plan->url) }}" class="">Detalhes</a></li>
    </ol> 

    <h1>Detalhes do Plano </h1>
@stop

@section('content')
    <div class="card">        
        <div class="card-header">
            @include('admin.includes.alerts')
            <form action="" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Digite a pesquisa !!" class="form-control" value="">
                    <button type="submit" class="btn btn-dark"> Filtrar </button>
                    <a href="{{ route('details.plan.create', $plan->url) }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Novo Detalhe</a>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>                                                
                    </tr>
                </thead>
                <tbody>
                    @foreach($details as $detail)
                        <tr>
                            <td>{{ $detail->name }}</td>     
                            <!-- aqui embaixo é detail pq é dentro do foreach!-->                       
                            <td>
                               <a href="{{route('details.plan.edit',[$plan->url, $detail->id])}}" class="btn btn-success"><i class="far fa-edit"></i> Editar</a>
                               <a href="{{route('details.plan.show',[$plan->url, $detail->id])}}" class="btn btn-danger"><i class="far fa-trash-alt"></i> Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
            
        </div>
    </div>
@endsection