@extends('partials.layout')

@section('content')


<div>
    <h2 class="mt-2">Ingrese un nuevo sitio turístico</h2>
    <div class="form-group mt-5">
        <label for="nombre">Ingrese el nombre del sitio turístico</label>
        <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del sitio turístico">
    </div>

    <div class="form-group">
        <label for="imagenes">Seleccione imágenes para el sitio</label>
        <input type="file" class="form-control-file" id="imagenes">
    </div>

    <div class="form-group">
        <label for="lugar">Indique en qué cantón y provincia se encuentra el sitio turístico</label>
        <input type="text" class="form-control" id="lugar" placeholder="Indique en qué cantón y provincia se encuentra el sitio turístico">
    </div>

    <div class="form-group mt-3">
        <label for="destino">Seleccion uno de los destinos</label>
        <select class="form-control" id="destino">
            <option value="playa">Playa</option>
            <option value="ciudad">Ciudad</option>
            <option value="montaña">Montaña</option>
            <option value="rural">Rural</option>
        </select>
    </div>

    <div class="form-group mt-3">
        <label for="cantidad">Seleccione la cantidad de personas con las que el sitio se puede visitar</label>
        <select class="form-control" id="cantidad">
            <option value="familia">Familia</option>
            <option value="pareja">Pareja</option>
            <option value="amigos">Amigos</option>
            <option value="solo">Solo</option>
        </select>
    </div>

    <div class="form-group mt-3">
        <label for="edad">Seleccione para qué rango de edad es apto este sitio</label>
        <select class="form-control" id="edad">
            <option value="todas">Todas las edades</option>
            <option value="joven">De 18 a 35 años</option>
            <option value="adulto">De 36 a 55 años</option>
            <option value="anciano">Mayores o iguales a 56 años</option>
        </select>
    </div>

    <div class="form-group mt-3">
        <div class="form-group">
            <label for="interes">Seleccione uno o más intereses</label>
            <select multiple class="form-control" id="interes">
                <option value="cultura">Cultura</option>
                <option value="historia">Historia</option>
                <option value="relajarse">Relajarse</option>
                <option value="actualidad">Actualidad</option>
                <option value="gastronomía">Gastronomía</option>
                <option value="entretenerse">Entretenerse</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="mensaje">Ingrese un mensaje para los visitante</label>
        <textarea class="form-control" id="mensaje" rows="3"></textarea>
    </div>

    <label for="mapa">Indique en el mapa la localización del sitio turístico</label>
    <div class="flex-center">
        <iframe id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15723.601357857187!2d-83.94266884999999!3d9.8587281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1sen!2scr!4v1590760363432!5m2!1sen!2scr" width="600" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

    <div class="form-group mt-5">
        <label for="video">Ingrese la URL del video que desea agregar al sitio</label>
        <input type="text" class="form-control" id="video" placeholder="Ingrese el nombre del sitio turístico">
    </div>

    <div class="content">
        <button type="submit" class="btn btn-round">Agregar</button>
    </div>
</div>

@endsection