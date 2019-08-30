<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    public function index($name){
        return 'Hola desde un controlador '.$name;

    }
    public function mostrarVista(){
        return view('ejemplo');
    }
    public function welcome(){
        return view('welcome');
    }
}
