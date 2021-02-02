  
@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" > <a href="{{ route('plans.index') }}" class="">Planos</a></li>
    </ol> 
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Digite a pesquisa !!" class="form-control" value="{{$filters['filter'] ?? '' }}">
                    <button type="submit" class="btn btn-dark"> Filtrar </button>
                    <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Novo Plano</a>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Descrição Plano</th>
                        <th>URL</th>
                        <th></th>                        
                        <th></th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>R$ {{ number_format($plan->price,2,',','.') }}</td>
                            <td>{{ $plan->description }}</td>                            
                            <td>{{ $plan->url }}</td>                            
                            <td><a href="{{route('plans.show',$plan->url)}}" class="btn btn-warning"><i class="fas fa-info"></i> Detalhes</a></td>
                            <td><a href="{{route('plans.edit',$plan->url)}}" class="btn btn-success"><i class="far fa-edit"></i> Editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
            
        </div>
    </div>
@stop