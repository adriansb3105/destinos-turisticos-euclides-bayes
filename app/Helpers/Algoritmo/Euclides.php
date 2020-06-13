<?php

namespace App\Helpers\Algoritmo;

use App\Helpers\ConvertirDatos;

class Euclides
{
  public static function euclides($respuestas, $datos)
  {
    $minimo = 9999;
    $resultado = "";

    foreach($datos as $actual)
    {
      $valor = 0;
      $actual = array_values((array) $actual);

      for($i = count($respuestas) - 1; $i >= 0; $i--)
      {
        $valorRespuesta = $respuestas[$i];
        $valorActual = $actual[$i];

        $valor += pow(ConvertirDatos::valor($valorRespuesta) - ConvertirDatos::valor($valorActual), 2 );
      }

      $valor = sqrt($valor);

      if($minimo == 0)
        return end($actual);
      else
        if($minimo > $valor) {
          $minimo = $valor;
          $resultado = end($actual);
        }
    }
    return $resultado;
  }
}