<?php

namespace App\Http\Controllers;

use App\Helpers\Algoritmo\Euclides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AtractivosAppController extends Controller
{
    public function getAtractivosEuclides($destino, $persona, $edad, $interes)
    {
        $tipos = DB::table('valores')->select('destino', 'persona', 'edad', 'interes', 'clase')->get();

        $busqueda = [$destino, $persona, $edad, $interes];

        $clase = Euclides::euclides($busqueda, $tipos);

        $atractivos = DB::select("select id, nombre, imagen, lugar, ubicacion, descripcion, video, clase from atractivos where clase='".$clase."';");
        
        return $atractivos;
    }

    public function getTiposBayes($destino, $persona, $edad, $interes)
    {
        $tipos = DB::table('valores')->select('destino', 'persona', 'edad', 'interes', 'clase')->get();

        $busqueda = [$destino, $persona, $edad, $interes];

        $clase = Euclides::euclides($busqueda, $tipos);
        
        return $clase;
    }

    public function getAtractivosTodos()
    {
        $atractivos = DB::table('atractivos')->select('id', 'nombre', 'imagen', 'lugar', 'ubicacion', 'descripcion', 'video', 'clase')->get();
        return $atractivos;
    }

    public function agregarAtractivo(Request $req)
    {
        return $req->input();
    }
}