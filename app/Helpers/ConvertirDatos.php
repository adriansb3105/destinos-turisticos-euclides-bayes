<?php

namespace App\Helpers;

class ConvertirDatos
{
  public static function valor($valor)
  {
    switch ($valor) {
      case 'playa':
      case 'familia':
      case 'joven':
      case 'cultura':

      case 'Playa':
      case 'Familia':
      case 'De 18 a 35 años':
      case 'Cultura':
        return 1;

      case 'ciudad':
      case 'pareja':
      case 'adulto':
      case 'historia':

      case 'Ciudad':
      case 'Pareja':
      case 'De 36 a 55 años':
      case 'Historia':
        return 2;

      case 'montana':
      case 'amigos':
      case 'anciano':
      case 'relajacion':

      case 'Montaña':
      case 'Amigos':
      case 'Mayores o iguales a 56 años':
      case 'Relajación':
        return 3;

      case 'rural':
      case 'solo':
      case 'actualidad':

      case 'Rural':
      case 'Solo':
      case 'Actualidad':
        return 4;

      case 'gastronomia':

      case 'Gastronomía':
        return 5;

      case 'entretenimiento':

      case 'Entretenimiento':
        return 6;

      default:
        return floatval($valor);
    }
  }
}
