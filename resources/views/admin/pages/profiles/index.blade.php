  
@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>Perfis </h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active" > <a href="{{ route('profiles.index') }}" class="">Perfis</a></li>
    </ol> 
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Digite a pesquisa !!" class="form-control" value="">
                    <button type="submit" class="btn btn-dark"> Filtrar </button>
                    <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> Novo Perfil</a>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>                        
                        <th>Descrição Plano</th>                        
                        <th></th>
                        <th></th>                        
                        <th></th>                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($profiles as $profile)
                        <tr>
                            <td>{{ $profile->name }}</td>                            
                            <td>{{ $profile->description }}</td>
                            <td><a href="{{route('profiles.edit',$profile->id)}}" class="btn btn-success"><i class="far fa-edit"></i> Editar</a></td>
                            <td><a href="{{route('profiles.show',$profile->id)}}" class="btn btn-danger"><i class="fas fa-info"></i> Deletar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
            
        </div>
    </div>
@endsection