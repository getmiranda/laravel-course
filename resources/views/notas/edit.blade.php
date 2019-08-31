@extends('template')

@section('titulo')
    Miranda
@endsection

@section('seccion')
<h1>Editar nota {{ $nota->id }}</h1>    

{{-- Mensaje succes --}}
@if (session('mensaje'))
    <div class="alert alert-success">
      {{ session('mensaje') }}
    </div>
@endif

{{-- formulario --}}
<form action="{{ route('notas.update', $nota->id) }}" method="POST">
    @csrf
    @method('PUT')

    @error('nombre')
        <div class="alert alert-danger">
        Nombre es un campo requerido
        </div>
    @enderror
    
    @if ($errors->has('description'))
        <div class="alert alert-danger alert-dismissible fade show">
            Descripcion es un campo requerido
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" >&times;</span>
            </button>
        </div>
    @endif
    
    <input type="text" class="form-control mb-2" name="nombre" placeholder="Nombre" value="{{ $nota->nombre }}">
    <input type="text" class="form-control mb-2" name="description" placeholder="Descripción" value="{{ $nota->description }}">
    <button class="btn btn-warning btn-block" type="submit">Edit</button>
</form>
{{-- End formulario --}}

@endsection