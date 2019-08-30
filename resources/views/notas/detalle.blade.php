@extends('template')

@section('seccion')

<h1>Detalle de nota: </h1><br>
<h4>id: {{ $nota->id }}</h4>
<h4>Nombre: {{ $nota->nombre }}</h4>
<h4>Detalle: {{ $nota->description }}</h4>
@endsection