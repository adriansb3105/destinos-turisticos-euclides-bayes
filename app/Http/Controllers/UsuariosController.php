<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function login($usuario, $contrasena)
    {
        $correcto = "";
        $administradores = DB::table('usuarios')->select('usuario', 'contrasena')->get();

        $administrador = array();
        foreach ($administradores as $actual) {
            $administrador = array_values((array) $actual);
        }

        if($administrador[0] == $usuario  && $administrador[1] == $contrasena)
        {
            $correcto = "true";
        }else{
            $correcto = "false";
        }
        return $correcto;
    }
}
