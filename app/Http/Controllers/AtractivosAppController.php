<?php

namespace App\Http\Controllers;

use App\Helpers\Algoritmo\Euclides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AtractivosAppController extends Controller
{
    public function getAtractivos($destino, $persona, $edad, $interes)
    {
        $tipos = DB::table('valores')->select('destino', 'persona', 'edad', 'interes', 'clase')->get();

        $busqueda = [$destino, $persona, $edad, $interes];

        $clase = Euclides::euclides($busqueda, $tipos);

        $atractivos = DB::select("select id, nombre, imagen, lugar, ubicacion, descripcion, video, clase from atractivos where clase='".$clase."';");
        
        return $atractivos;
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