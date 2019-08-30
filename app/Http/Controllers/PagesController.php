<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    //
    public function inicio(){
        $notas = App\Nota::all();
        return view('first', compact('notas'));
    }

    public function nosotros($nombre = null){
        $array = ['Miranda', 'Villagrán'];

        return view('nosotros', compact('array', 'nombre'));
    }

    public function blog(){
        return view('blog');
    }

    public function photos(){
        return view('photos');
    }

    public function detalle($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas/detalle', compact('nota'));
    }

    public function crear(Request $request){
        // return $request->all();
        $nota = new App\Nota;
        $nota->nombre = $request->nombre;
        $nota->description = $request->description;

        $nota->save();

        return back()->with('mensaje', 'Nota guardada!');
    }
}
