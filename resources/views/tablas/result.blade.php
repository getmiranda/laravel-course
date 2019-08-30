@extends('layouts.template2')
@section('titulo')
    Tablas de Multiplicar   
@endsection
@section('content')
<h1>Tabla de multiplicar del {{$num}}</h1>

@for ($i = 1; $i <= 10; $i++)
    {{$num}} x {{$i}} = {{$num*$i}} <br>
@endfor

@endsection