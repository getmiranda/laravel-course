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

<form action="{{ route('notas.crear') }}" method="POST">
  @csrf
  <input type="text" class="form-control mb-2" name="nombre" placeholder="Nombre">
  <input type="text" class="form-control mb-2" name="description" placeholder="Descripción">
  <button class="btn btn-primary btn-block" type="submit">Add</button>
</form>

<h1 class="display-4">Notas</h1>
  <table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripción</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($notas as $item) 
        <tr>
          <th scope="row">{{ $item->id }}</th>
          <td>
            <a href="{{route('notas.detalle', $item)}}">
                  {{ $item->nombre}}
            </a>
          </td>
          <td>{{ $item->description}}</td>
          <td>@mdo</td>
        </tr>
      @endforeach
  </tbody>
  </table>
@endsection