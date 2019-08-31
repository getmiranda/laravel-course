@extends('template')

@section('titulo')
    Miranda
@endsection

@section('seccion')

@if (session('mensaje'))
    <div class="alert alert-success">
      {{ session('mensaje') }}
    </div>
@endif

<h1 class="display-"> Agregar</h1>

{{-- formulario --}}
<form action="{{ route('notas.crear') }}" method="POST">
  @csrf
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

  <input type="text" class="form-control mb-2" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">
  <input type="text" class="form-control mb-2" name="description" placeholder="Descripción" value="{{ old('description') }}">
  <button class="btn btn-primary btn-block" type="submit">Add</button>
</form>
{{-- End formulario --}}

<h1 class="display-4">Notas</h1>
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      {{-- Cuerpo de notas --}}
      @foreach ($notas as $item) 
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>
            <a href="{{route('notas.detalle', $item)}}">
                  {{ $item->nombre}}
            </a>
          </td>
          <td>{{ $item->description}}</td>
          <td>

            {{-- Boton editar --}}
            <a href="{{ route('notas.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>

            {{-- Boton eliminar --}}
            <form action="{{ route('notas.delete', $item) }}" class="d-inline" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm">Delete</button>          
            </form>

          </td>
        </tr> 
      @endforeach
      {{-- Fin cuerpo de notas --}}
  </tbody>
  </table>
  {{ $notas->links() }}
@endsection