@extends('template')

@section('seccion')
<h1>Calculadora</h1>

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

<form method="POST" action="{{ route('calculate.store') }}" >
    @csrf
    <div class="form-group">
        <label for="">Numero 1</label>
        <input type="text" name="num1" class="form-control" value="{{ old('num1') }}">
        <label for="">Numero 2</label>
        <input type="text" name="num2" class="form-control" value="{{ old('num2') }}">
        <label for="">Operacion Suma</label>
        <select class="form-control" name="operaciones">
                <option>Opciones...</option>
                <option value="1">Suma</option>
                <option value="2">Resta</option>
                <option value="3">Divicion</option>
                <option value="4">Multiplicacion</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>
@endsection