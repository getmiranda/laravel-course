@extends('template')

@section('seccion')
<h1>Calculadora</h1>

@if (session('mensaje'))
    <div class="alert alert-success">
      {{ session('mensaje')  }}
    </div>
@endif

<form method="POST" action="{{ route('calculate.store') }}" >
    @csrf
    <div class="form-group">
        <label for="">Numero 1</label>
        <input type="text" name="num1" class="form-control">
        <label for="">Numero 2</label>
        <input type="text" name="num2" class="form-control">
        <label for="">Operacion Suma</label>
        <select class="form-control" name="operaciones">
                <option selected>Opciones...</option>
                <option value="1">Suma</option>
                <option value="2">Resta</option>
                <option value="3">Divicion</option>
                <option value="4">Multiplicacion</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>
@endsection