<?php

namespace App\Helpers\Algoritmo;

use App\Helpers\ConvertirDatos;

class Euclides
{
  /**
         * Función que calcula, toma como parámetro los valores ca, ec, ea, or
   */
  public static function euclides($respuestas, $datos)
  {
    /**
     * Se crea una variable mínimo con un valor inicial alto, cambiará según se vaya obteniendo un valor más bajo
     */
    $minimo = 9999;
    $resultado = "";

    /**
     * Recorre los registros obtenidos de la tabla de la base de datos
     */
    foreach ($datos as $actual) {
      $valor = 0;

      /**
       * Convierte el objeto actual, que es cada uno de los valores de la base de datos, en un arreglo
       */
      $actual = array_values((array) $actual);

      /**
       * Recorre el arreglo con los valores obtenidos de las respuestas del usuario
       */
      for ($i = count($respuestas) - 1; $i >= 0; $i--) {
        /**
         * Obtiene el valor númerico de las entradas dadas
         */
        $valorRespuesta = $respuestas[$i];
        $valorActual = $actual[$i];

        /**
         * Toma el valor de cada columna del arreglo de las respuestas del usuario (ca, ec, ea, or) y le resta la misma columna de cada iteración de los valores de la base de datos
         */
        $valor += pow(ConvertirDatos::valor($valorRespuesta) - ConvertirDatos::valor($valorActual), 2);
      }

      /**
       * Toma el valor obtenido anteriormente y obtiene su raíz cuadrada
       */
      $valor = sqrt($valor);

      /**
       * Pregunta si el mínimo es 0 (los valores obtenidos del usuario son iguales a una entrada de la base de datos), y se devuelve ese mismo dato
       */
      if ($minimo == 0)
        return end($actual);
      else
        /**
             * Pregunta si el valor mínimo es mayor al valor actual del ciclo, y si es así el valor mínimo toma su valor
             */
        if ($minimo > $valor) {
          $minimo = $valor;
          /**
           * Guarda en la variable resultado el dato que tenga menor distancia hasta el momento
           */
          $resultado = end($actual);
        }
      /**
       * Si no entra a la anterior condición, entonces el valor mínimo permanece y el resultado sigue siendo el de la última distancia menor
       */
    }
    return $resultado;
  }
}
