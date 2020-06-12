<?php

namespace App\Helpers;

class ConvertirDatos
{
  public static function valor($valor)
  {
    switch ($valor) {
      case 'Playa':
      case 'Familia':
      case 'De 18 a 35 años':
      case 'Cultura':
        return 1;

      case 'Ciudad':
      case 'Pareja':
      case 'De 36 a 55 años':
      case 'Historia':
        return 2;

      case 'Montaña':
      case 'Amigos':
      case 'Mayores o iguales a 56 años':
      case 'Relajación':
        return 3;

      case 'Rural':
      case 'Solo':
      case 'Actualidad':
        return 4;

      case 'Gastronomía':
        return 5;

      case 'Entretenimiento':
        return 6;

      default:
        return floatval($valor);
    }
  }
}
