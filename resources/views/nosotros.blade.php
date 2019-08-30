@extends('template')

@section('seccion')
<h1>Nosotros</h1>

@foreach($array as $item)

    <a href="{{ route('nosotros', $item) }}" class="h4 text-danger">{{$item}}</a><br>

@endforeach

@if(!empty($nombre))

    @switch($nombre)
        @case('Miranda')
            <h2 class="mt-5">Resumé de {{$nombre}}</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi repudiandae ullam facilis dolorum? Officiis assumenda voluptate placeat possimus nam corporis quo molestiae dolorum. Tempora repellendus sequi soluta, ullam possimus rerum!</p>
            @break
        @case('Villagrán')
            <h2 class="mt-5">Resumé de {{$nombre}}</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi repudiandae ullam facilis dolorum? Officiis assumenda voluptate placeat possimus nam corporis quo molestiae dolorum. Tempora repellendus sequi soluta, ullam possimus rerum!</p>
            @break  
    @endswitch

@endif

@endsection()