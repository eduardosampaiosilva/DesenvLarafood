  
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
                            <td><a href="{{route('plans.edit',$plan->url)}}" class="btn btn-success"><i class="far fa-edit"></i> Editar</a></td>
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
@stop