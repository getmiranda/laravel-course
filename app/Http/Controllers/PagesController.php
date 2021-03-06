<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class PagesController extends Controller
{
    //
    public function inicio(){
        $notas = App\Nota::paginate(4);
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
        //Los conmbre deben llamarse igual que los input del formulario
        $request->validate([
            'nombre' => 'required',
            'description' => 'required'
        ]);

        $nota = new App\Nota;
        $nota->nombre = $request->nombre;
        $nota->description = $request->description;
        $nota->image = 'null';

        $nota->save();

        return back()->with('mensaje', 'Nota guardada!');
    }

    public function edit($id){
        $nota = App\Nota::findOrFail($id);
        return view('notas.edit', compact('nota'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'description' => 'required'
        ]);

        $nota = App\Nota::findOrFail($id);

        $nota->nombre = $request->nombre;
        $nota->description = $request->description;
        $nota->save();

        return back()->with('mensaje', 'Nota modificada!');
    }

    public function delete($id){
        $nota = App\Nota::findOrFail($id);
        $nota->delete();

        return back()->with('mensaje', 'La nota ha sido eliminada!');
    }
}
