  
@extends('adminlte::page')

@section('title', 'Editar o Perfil')

@section('content_header')
    <h1>Editar Perfil ( {{$profiles->name}} )</h1> 
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update',$profiles->id) }}" class="form" method="POST">                
                @csrf
                @method('PUT') <!-- Envia por método Put pra dar o Update !-->          
                @include('admin.pages.profiles._partials.form') <!-- Reaproveitamento de código para usar no edit  !-->          
            </form>
        </div>
    </div>
@endsection