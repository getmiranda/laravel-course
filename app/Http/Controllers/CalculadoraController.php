<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calculadora;

class CalculadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cal.form_cal');
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
            'num1' => 'required|regex:([0-9]+)',
            'num2' => 'required|regex:([0-9]+)',
            'operaciones' => 'required',
        ]);
        //Primera forma
        $cal = new Calculadora; // Instanciamos una clase del modelo Note

        //Obtenemos los datos de los input del form
        $num1 = $request->get('num1');
        $num2 = $request->get('num2');
        $op = $request->get('operaciones');

        switch ($op) {
            case 1: //Suma
                $res = $cal->add($num1, $num2);
                break;
            
            case 2: //Resta
                $res = $cal->sub($num1, $num2);
                break;
            
            case 3: //Division
                $res = $cal->div($num1, $num2);
                break;
            
            case 4: //Multiplicacion
                $res = $cal->mul($num1, $num2);
                break;
            
            default:
                $res = 0;
                break;
        }

        if ($res != 0) {
            $msj = 'The result is: '.$res;
        }else {
            $msj = 'Choose an operation';
        }

        //return view('tablas.resultado', compact('res'));
        return back()->with('mensaje', $msj);
        
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
        //
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
        //
    }
}
