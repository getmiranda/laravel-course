@extends('template')

@section('seccion')
<h1>Operaciones</h1>

<form method="POST" action="{{ route('resultado') }}" >
    @csrf
    <div class="form-group">
        <label for="">Numero 1</label>
        <input type="text" name="numero1" class="form-control">
        <label for="">Numero 2</label>
        <input type="text" name="numero2" class="form-control">
        <label for="">Operacion</label>
        <select class="form-control" name="operaciones">
                <option value="1">Suma</option>
                <option value="2">Resta</option>
                <option value="3">Divicion</option>
                <option value="4">Multiplicacion</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>
@endsection