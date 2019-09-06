@extends('template')

@section('seccion')
<h1>Formulario Novela</h1>

@if (session('mensaje'))
    <div class="alert alert-success">
      {{ session('mensaje')  }}
    </div>
@endif

{{-- Todos los errores sin personalizar --}}
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" >&times;</span>
            </button>
        </div>
    @endforeach
@endif

<form method="POST" action="{{ route('novela.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <input type="text" name="titulo" class="form-control mb-2" placeholder="Titulo" value="{{ old('titulo') }}">
        <input type="text" name="protagonista" class="form-control mb-2" placeholder="Protagonista" value="{{ old('protagonista') }}">
        <input type="text" name="director" class="form-control mb-2" placeholder="Director" value="{{ old('director') }}">
        <input type="text" name="anio" class="form-control mb-2" placeholder="Año" value="{{ old('anio') }}">
        <input type="file" name="image" class="form-control-file">
         
        
    </div>
    <button type="submit" class="btn btn-primary btn-block">Send</button>
</form>

<h1 class="display-4">Lista de novelas</h1>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Image</th>
        <th scope="col">Titulo</th>
        <th scope="col">Protagonista</th>
        <th scope="col">Director</th>
        <th scope="col">Año</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      {{-- Cuerpo de novelas --}}
      @foreach ($novelas as $item) 
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td scope="row"><img src="{{ URL::to('/') }}/images/novelas/{{ $item->image}}" alt="Not Found." width="75"></td>
            <td>{{ $item->titulo}}</td>
            <td>{{ $item->protagonista}}</td>
            <td>{{ $item->director}}</td>
            <td>{{ $item->anio}}</td>
            <td>

                {{-- Boton editar --}}
                <a href="{{ route('novela.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>

                {{-- Boton eliminar --}}
                <form action="{{ route('novela.destroy', $item) }}" class="d-inline" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">Delete</button>          
                </form>

            </td>
        </tr> 
      @endforeach
      {{-- Fin cuerpo de novelas --}}
  </tbody>
  </table>
  {{ $novelas->links() }}
@endsection