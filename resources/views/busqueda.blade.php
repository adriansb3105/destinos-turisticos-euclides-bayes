@extends('partials.layout')

@section('content')

<div class="row grey-border width-90 main-title mt-3">
    <div class="col text-center">
        <p>Seleccione los siguientes criterios para obtener resultados basados en el cálculo de distancia Euclidiana y de Bayes.</p>
        <p>Después seleccione el resultado deseado y haga click sobre la imagen.</p>
    </div>
</div>
<div class="row mt-3">
    <div class="col-3">
        <form>
            <div class="form-group mt-3">
                <label for="destino">Destino</label>
                <select class="form-control" id="destino">
                    <option value="playa">Playa</option>
                    <option value="ciudad">Ciudad</option>
                    <option value="montana">Montaña</option>
                    <option value="rural">Rural</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="cantidad">Cantidad de personas</label>
                <select class="form-control" id="cantidad">
                    <option value="familia">Familia</option>
                    <option value="pareja">Pareja</option>
                    <option value="amigos">Amigos</option>
                    <option value="solo">Solo</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="edad">Rango de edad</label>
                <select class="form-control" id="edad">
                    <option value="joven">De 18 a 35 años</option>
                    <option value="adulto">De 36 a 55 años</option>
                    <option value="anciano">Mayores o iguales a 56 años</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="interes">Intereses</label>
                <select class="form-control" id="interes">
                    <option value="cultura">Cultura</option>
                    <option value="historia">Historia</option>
                    <option value="relajacion">Relajación</option>
                    <option value="actualidad">Actualidad</option>
                    <option value="gastronomia">Gastronomía</option>
                    <option value="entretenimiento">Entretenimiento</option>
                </select>
            </div>

            <div class="content">
                <button type="submit" class="btn btn-round">Filtrar</button>
            </div>
        </form>

        <!-- Variar mansaje si se encuentran 0, 1 o varios resultados -->
        <div class="green-border text-center">
            <h5 class="mt-2">Se encontraron <span class="text-bold">X</span> resultados</h5>
        </div>
    </div>

    <div class="col-9">
        <div class="row">
            <!-- Cambiar usuario por el que se envia desde Euclides -->
            <h5 class="mt-2 green-font">Su tipo de viajero es <span class="text-bold" id="tipoViajeroBusqueda">X</span></h5>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="flex-container-resultados">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset('/img/lapenca.png') }}" alt="principal" class="img-results">
                        </div>
                        <div class="col-5 mt-2">
                            <p>Cantón, Provincia</p>
                            <p>Playa #1</p>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalCenter">
                                Ver
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset('/img/lapenca.png') }}" alt="principal" class="img-results">
                        </div>
                        <div class="col-5 mt-2">
                            <p>Cantón, Provincia</p>
                            <p>Playa #2</p>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalCenter">
                                Ver
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset('/img/lapenca.png') }}" alt="principal" class="img-results">
                        </div>
                        <div class="col-5 mt-2">
                            <p>Cantón, Provincia</p>
                            <p>Playa #3</p>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalCenter">
                                Ver
                            </button>
                        </div>
                    </div>

                    <nav aria-label="Page navigation example" class="mt-2">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Playa #</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('/img/lapenca.png') }}" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>Cantón, Provincia</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/img/lapenca.png') }}" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>Cantón, Provincia</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('/img/lapenca.png') }}" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>Cantón, Provincia</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col mt-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15723.412793483032!2d-83.93651516642385!3d9.862681127764471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0dfe38e263dc7%3A0xc4bab69e429d9be4!2sOccidental%2C%20Cartago%20Province!5e0!3m2!1sen!2scr!4v1590756371442!5m2!1sen!2scr" width="300" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>

                    <div class="col">
                        <p class="mt-5">Excelente lugar para vacacionar con la familia y los amigos, a tan solo 30 minutos de Liberia usted podrá disfrutar de esta hermosa playa.</p>
                    </div>
                </div>

                <div class="row flex-center">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/YavNJawZ52A" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@endsection