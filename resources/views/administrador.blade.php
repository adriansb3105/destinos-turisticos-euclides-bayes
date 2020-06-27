@extends('partials.layout')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<button type="button" class="btn btn-info mt-4 mb-4 float-right" data-toggle="modal" data-target="#exampleModalCenter">
    Agregar sitio turístico
</button>

<div class="container-pagination">
    <table class="table table-hover">
        <thead>
            <tr>
                <th></th>
                <th>Nombre</th>
                <th>Lugar</th>
                <th>Tipo</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="table-body">

        </tbody>
    </table>
</div>

<h3 id="NoResultados">No se encontraron atractivos turísticos</h3>

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

                    <div class="form-group">
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
                        <label for="lugar">Indique en qué cantón y provincia se encuentra el sitio turístico</label>
                        <input type="text" class="form-control" id="lugar" placeholder="Indique en qué cantón y provincia se encuentra el sitio turístico">
                    </div>

                    <div class="form-group">
                        <label for="mensaje">Ingrese un mensaje para los visitante</label>
                        <textarea class="form-control" id="mensaje" rows="3"></textarea>
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
                    <p id="idEditar" hidden>id</p>

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
                        <label for="lugarEditar">Indique en qué cantón y provincia se encuentra el sitio turístico</label>
                        <input type="text" class="form-control" id="lugarEditar" placeholder="Indique en qué cantón y provincia se encuentra el sitio turístico">
                    </div>

                    <div class="form-group">
                        <label for="mensajeEditar">Ingrese un mensaje para los visitante</label>
                        <textarea class="form-control" id="mensajeEditar" rows="3"></textarea>
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


<script src="{{ asset('/js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('/js/sitios.js') }}"></script>

<script>
    if (!localStorage.getItem("login")) {
        window.location.href = "/";
    }
</script>

@endsection