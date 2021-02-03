  
@extends('adminlte::page')

@section('title', 'Editar o Plano')

@section('content_header')
    <h1>Editar Plano ( {{$plans->name}} )</h1> 
@stop

@section('content')
   <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update',$plans->url) }}" class="form" method="POST">                
                @csrf
                @method('PUT') <!-- Envia por método Put pra dar o Update !-->          
                @include('admin.pages.plans._partials.form') <!-- Reaproveitamento de código para usar no edit  !-->          
            </form>
        </div>
    </div>
@endsection