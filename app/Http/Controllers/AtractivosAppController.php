<?php

namespace App\Http\Controllers;

use App\Helpers\Algoritmo\NaiveBayes;
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

        $atractivos = DB::select("select id, nombre, imagen, lugar, ubicacion, descripcion, video, clase from atractivos where clase='" . $clase . "';");

        return $atractivos;
    }

    public function getTiposBayes(Request $request)
    {
        $destino = $request->input('destino');
        $persona = $request->input('persona');
        $edad = $request->input('edad');
        $interes = $request->input('interes');

        $tipos = DB::table('valores')->select('destino', 'persona', 'edad', 'interes', 'clase')->get();

        $busqueda = [$destino, $persona, $edad, $interes];

        //$clase = NaiveBayes::bayes($tipos, $busqueda);
        $clase = Euclides::euclides($busqueda, $tipos);
        return $clase;
    }

    public function getAtractivosTodos()
    {
        $atractivos = DB::select('select id, nombre, imagen, lugar, ubicacion, descripcion, video, clase from atractivos;');
        return $atractivos;
    }

    public function agregarAtractivo(Request $request)
    {
        $nombre = $request->input('nombre');
        $tipo = $request->input('tipo');
        $imagen = $request->input('imagen');
        $lugar = $request->input('lugar');
        $mensaje = $request->input('mensaje');
        $mapa = $request->input('mapa');
        $video = $request->input('video');
        $destino = $request->input('destino');
        $persona = $request->input('persona');
        $edad = $request->input('edad');
        $interes = $request->input('interes');
        
        $id = DB::table('atractivos')->insertGetId(
            [
                'nombre' => $nombre,
                'imagen' => $imagen,
                'lugar' => $lugar,
                'ubicacion' => $mapa,
                'descripcion' => $mensaje,
                'video' => $video,
                'clase' => $tipo
            ]
        );

        DB::table('valores')->insert(
            [
                'destino' => $destino,
                'persona' => $persona,
                'edad' => $edad,
                'interes' => $interes,
                'clase' => $tipo
            ]
        );

        return $id;
    }

    public function editarAtractivo(Request $request)
    {
        $id = $request->input('id');
        $nombre = $request->input('nombre');
        $tipo = $request->input('tipo');
        $imagen = $request->input('imagen');
        $lugar = $request->input('lugar');
        $mensaje = $request->input('mensaje');
        $mapa = $request->input('mapa');
        $video = $request->input('video');
        $destino = $request->input('destino');
        $persona = $request->input('persona');
        $edad = $request->input('edad');
        $interes = $request->input('interes');

        $atractivo = DB::table('atractivos')
              ->where('id', $id)
              ->update([
                'nombre' => $nombre,
                'imagen' => $imagen,
                'lugar' => $lugar,
                'ubicacion' => $mapa,
                'descripcion' => $mensaje,
                'video' => $video,
                'clase' => $tipo
            ]);

        DB::table('valores')->insert(
            [
                'destino' => $destino,
                'persona' => $persona,
                'edad' => $edad,
                'interes' => $interes,
                'clase' => $tipo
            ]
        );

        return $atractivo;
    }

    public function eliminarAtractivo(Request $request)
    {
        $id = $request->input('id');

        DB::table('atractivos')->where('id', '=', $id)->delete();

        return $id;
    }    
}
