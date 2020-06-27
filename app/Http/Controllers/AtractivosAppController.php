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

        $atractivos = DB::select("select id, nombre, imagen, lugar, ubicacion, descripcion, video, clase from atractivos where clase='".$clase."';");
        
        return $atractivos;
    }

    public function getTiposBayes($destino, $persona, $edad, $interes)
    {
        $tipos = DB::table('valores')->select('destino', 'persona', 'edad', 'interes', 'clase')->get();

        $busqueda = [$destino, $persona, $edad, $interes];

        $clase = NaiveBayes::bayes($tipos, $busqueda);
        return $clase;
    }

    public function getAtractivosTodos()
    {
        $atractivos = DB::table('atractivos')->select('id', 'nombre', 'imagen', 'lugar', 'ubicacion', 'descripcion', 'video', 'clase')->get();
        return $atractivos;
    }
/*
    public function agregarAtractivo($nombre, $tipo, $imagen, $lugar, $mensaje, $mapa, $video)
    {
        //$result = DB::insert("insert into atractivos(nombre, imagen, lugar, ubicacion, descripcion, video, clase) values(".$nombre.",".$imagen.",".$lugar.",".$mapa.",".$mensaje.",".$video.",".$tipo.");");
        $result = "insert into atractivos(nombre, imagen, lugar, ubicacion, descripcion, video, clase) values(".$nombre.",".$imagen.",".$lugar.",".$mapa.",".$mensaje.",".$video.",".$tipo.");";
        return $result;
    }
    */

    public function agregarAtractivo(Request $request)
    {
        $nombre = $request->input('nombre');
        $tipo = $request->input('tipo');
        $imagen = $request->input('imagen');
        $lugar = $request->input('lugar');
        $mensaje = $request->input('mensaje');
        $mapa = $request->input('mapa');
        $video = $request->input('video');

        //$result = DB::insert("insert into atractivos(nombre, imagen, lugar, ubicacion, descripcion, video, clase) values(".$nombre.",".$imagen.",".$lugar.",".$mapa.",".$mensaje.",".$video.",".$tipo.");");
        $result = "insert into atractivos(nombre, imagen, lugar, ubicacion, descripcion, video, clase) values(".$nombre.",".$imagen.",".$lugar.",".$mapa.",".$mensaje.",".$video.",".$tipo.");";
        return $result;
    }
}