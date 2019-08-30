@extends('layouts.template2')
@section('titulo')
    Ejemplo de template    
@endsection

@section('content')

<form method="POST" action="{{ route('result') }}" >
    @csrf
    <div class="form-group">
        <label for="">Numero</label>
        <input type="text" name="numero" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Send</button>
</form>
@endsection