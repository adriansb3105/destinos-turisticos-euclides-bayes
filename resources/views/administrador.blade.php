@extends('partials.layout')

@section('content')

<button type="button" class="btn btn-info mt-4 mb-4 float-right" data-toggle="modal" data-target="#exampleModalCenter">
    Agregar sitio turístico
</button>

<table id="tablaAtractivos" class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Lugar</th>
            <th scope="col">Tipo</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <!-- <th scope="col">Ubicación</th>
            <th scope="col">Descripción</th> -->
        </tr>
    </thead>
</table>

<h3 id="NoResultados">No se encontraron atractivos turísticos</h3>


<!--<nav id="paginacion" aria-label="...">
    <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#">Next</a>
        </li>
    </ul>
</nav>-->

<nav aria-label="paginacion">
    <ul id="paginacion" class="pagination justify-content-end">
    </ul>
</nav>

<!-- Modal Agregar -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ingrese un nuevo sitio turístico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="form-group">
                        <label for="nombre">Ingrese el nombre del sitio turístico</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del sitio turístico">
                    </div>

                    <div class="form-group mt-3">
                        <label for="tipo">Seleccione la clasificación para este sitio</label>
                        <select class="form-control" id="tipo">
                            <option value="pack">Pack</option>
                            <option value="urbano">Urbano</option>
                            <option value="playero">Playero</option>
                            <option value="visitante">Visitante</option>
                            <option value="gourmet">Gourmet</option>
                            <option value="insaciable">Insaciable</option>
                            <option value="oportunista">Oportunista</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="imagenes">Seleccione imágenes para el sitio</label>
                        <input type="file" class="form-control-file" id="imagenes">
                    </div>

                    <div class="form-group">
                        <label for="lugar">Indique en qué cantón y provincia se encuentra el sitio turístico</label>
                        <input type="text" class="form-control" id="lugar" placeholder="Indique en qué cantón y provincia se encuentra el sitio turístico">
                    </div>

                    <!-- <div class="form-group mt-3">
                        <label for="destino">Seleccione el tipo de destino</label>
                        <select class="form-control" id="destino">
                            <option value="playa">Playa</option>
                            <option value="ciudad">Ciudad</option>
                            <option value="montana">Montaña</option>
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
                            <option value="joven">De 18 a 35 años</option>
                            <option value="adulto">De 36 a 55 años</option>
                            <option value="anciano">Mayores o iguales a 56 años</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <div class="form-group">
                            <label for="interes">Seleccione un interés al que pertence este sitio</label>
                            <select class="form-control" id="interes">
                                <option value="cultura">Cultura</option>
                                <option value="historia">Historia</option>
                                <option value="relajacion">Relajación</option>
                                <option value="actualidad">Actualidad</option>
                                <option value="gastronomia">Gastronomía</option>
                                <option value="entretenimiento">Entretenimiento</option>
                            </select>
                        </div>
                    </div> -->

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
                        <button onclick="insertarSitio();" type="submit" class="btn btn-round">Agregar</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="exampleModalCenterEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar el sitio turístico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="form-group">
                        <label for="nombreEditar">Ingrese el nombre del sitio turístico</label>
                        <input type="text" class="form-control" id="nombreEditar" placeholder="Ingrese el nombre del sitio turístico">
                    </div>

                    <div class="form-group mt-3">
                        <label for="tipoEditar">Seleccione la clasificación para este sitio</label>
                        <select class="form-control" id="tipoEditar">
                            <option value="pack">Pack</option>
                            <option value="urbano">Urbano</option>
                            <option value="playero">Playero</option>
                            <option value="visitante">Visitante</option>
                            <option value="gourmet">Gourmet</option>
                            <option value="insaciable">Insaciable</option>
                            <option value="oportunista">Oportunista</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="imagenesEditar">Seleccione imágenes para el sitio</label>
                        <input type="file" class="form-control-file" id="imagenesEditar">
                    </div>

                    <div class="form-group">
                        <label for="lugarEditar">Indique en qué cantón y provincia se encuentra el sitio turístico</label>
                        <input type="text" class="form-control" id="lugarEditar" placeholder="Indique en qué cantón y provincia se encuentra el sitio turístico">
                    </div>

                    <!-- <div class="form-group mt-3">
                        <label for="destinoEditar">Seleccione el tipo de destino</label>
                        <select class="form-control" id="destinoEditar">
                            <option value="playa">Playa</option>
                            <option value="ciudad">Ciudad</option>
                            <option value="montana">Montaña</option>
                            <option value="rural">Rural</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="cantidadEditar">Seleccione la cantidad de personas con las que el sitio se puede visitar</label>
                        <select class="form-control" id="cantidadEditar">
                            <option value="familia">Familia</option>
                            <option value="pareja">Pareja</option>
                            <option value="amigos">Amigos</option>
                            <option value="solo">Solo</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="edadEditar">Seleccione para qué rango de edad es apto este sitio</label>
                        <select class="form-control" id="edadEditar">
                            <option value="joven">De 18 a 35 años</option>
                            <option value="adulto">De 36 a 55 años</option>
                            <option value="anciano">Mayores o iguales a 56 años</option>
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <div class="form-group">
                            <label for="interesEditar">Seleccione un interés al que pertence este sitio</label>
                            <select class="form-control" id="interesEditar">
                                <option value="cultura">Cultura</option>
                                <option value="historia">Historia</option>
                                <option value="relajacion">Relajación</option>
                                <option value="actualidad">Actualidad</option>
                                <option value="gastronomia">Gastronomía</option>
                                <option value="entretenimiento">Entretenimiento</option>
                            </select>
                        </div>
                    </div> -->

                    <div class="form-group">
                        <label for="mensajeEditar">Ingrese un mensaje para los visitante</label>
                        <textarea class="form-control" id="mensajeEditar" rows="3"></textarea>
                    </div>

                    <label for="mapaEditar">Indique en el mapa la localización del sitio turístico</label>
                    <div class="flex-center">
                        <iframe id="mapaEditar" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15723.601357857187!2d-83.94266884999999!3d9.8587281!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m3!3e6!4m0!4m0!5e0!3m2!1sen!2scr!4v1590760363432!5m2!1sen!2scr" width="600" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>

                    <div class="form-group mt-5">
                        <label for="videoEditar">Ingrese la URL del video que desea agregar al sitio</label>
                        <input type="text" class="form-control" id="videoEditar" placeholder="Ingrese el nombre del sitio turístico">
                    </div>

                    <div class="content">
                        <button onclick="editarSitio();" type="submit" class="btn btn-round">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('/js/sitios.js') }}"></script>

@endsection