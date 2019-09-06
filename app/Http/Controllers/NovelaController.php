<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novelas;

class NovelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $novelas = Novelas::paginate(5);
        return view('novel.form_novel', compact('novelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $novelas = Novelas::paginate(5);
        return view('novel.form_novel', compact('novelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'titulo'        => 'required|regex:/[a-zA-Z0-9]+/',
            'protagonista'  => 'required',
            'director'      => 'required',
            'anio'          => 'required|regex:([0-9]+)'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image -> move(public_path('images/novelas'), $new_name);

        $novela = new Novelas;

        $novela->image = $new_name;
        $novela->titulo = $request->get('titulo');
        $novela->protagonista = $request->get('protagonista');
        $novela->director = $request->get('director');
        $novela->anio = $request->get('anio');
        

        $novela->save();

        return back()->with('mensaje', 'Novela guardada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $novela = Novelas::find($id);
        return view('novel.form_novel_update', compact('novela'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novela = Novelas::find($id);
        
        $novela->delete();

        return back()->with('mensaje', 'La novela ha sido eliminada!');
    }
}
