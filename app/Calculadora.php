<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculadora extends Model
{

    public function add($num1, $num2){
        return $num1 + $num2;
    }

    public function sub($num1, $num2){
        return $num1 - $num2;
    }

    public function div($num1, $num2){
        return $num1 / $num2;
    }

    public function mul($num1, $num2){
        return $num1 * $num2;
    }
}
