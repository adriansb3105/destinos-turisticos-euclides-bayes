@extends('partials.layout')

@section('content')

<div class="row">
    <div class="col-9">
        <div class="row mt-3">
            <div class="col-3">
                <div class="flex-container-tipos">
                    <div onclick="description('pack');">Pack</div>
                    <div onclick="description('urbano');">Urbano</div>
                    <div onclick="description('playero');">Playero</div>
                    <div onclick="description('visitante');">Visitante</div>
                    <div onclick="description('gourmet');">Gourmet</div>
                    <div onclick="description('insaciable');">Insaciable</div>
                    <div onclick="description('oportunista');">Oportunista</div>
                </div>
            </div>

            <div class="col-9">
                <div class="flex-container-definiciones">
                    <p class="text-bold">Objetivo:</p>
                    <p id="descripcionObjetivo"></p>
                    <p class="text-bold">Destino de preferencia:</p>
                    <p id="descripcionDestino"></p>
                    <p class="text-bold">Volumen medio:</p>
                    <p id="descripcionVolumen"></p>
                    <p class="text-bold">Cantidad de personas:</p>
                    <p id="descripcionCantidad"></p>
                    <p class="text-bold">Rango de edad:</p>
                    <p id="descripcionEdad"></p>
                    <p class="text-bold">Disposición de viajar:</p>
                    <p id="descripcionDisposicion"></p>
                    <p class="text-bold">Intereses:</p>
                    <p id="descripcionIntereses"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="content">
            <h2 class="grey-font mt-5">Descubre tu tipo</h2>
        </div>

        <div>
            <div class="form-group mt-3">
                <label for="destinoTipo">Destino</label>
                <select class="form-control" id="destinoTipo">
                    <option value="playa">Playa</option>
                    <option value="ciudad">Ciudad</option>
                    <option value="montana">Montaña</option>
                    <option value="rural">Rural</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="cantidadTipo">Cantidad de personas</label>
                <select class="form-control" id="cantidadTipo">
                    <option value="familia">Familia</option>
                    <option value="pareja">Pareja</option>
                    <option value="amigos">Amigos</option>
                    <option value="solo">Solo</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="edadTipo">Rango de edad</label>
                <select class="form-control" id="edadTipo">
                    <option value="joven">De 18 a 35 años</option>
                    <option value="adulto">De 36 a 55 años</option>
                    <option value="anciano">Mayores o iguales a 56 años</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="interesTipo">Intereses</label>
                <select class="form-control" id="interesTipo">
                    <option value="cultura">Cultura</option>
                    <option value="historia">Historia</option>
                    <option value="relajacion">Relajación</option>
                    <option value="actualidad">Actualidad</option>
                    <option value="gastronomia">Gastronomía</option>
                    <option value="entretenimiento">Entretenimiento</option>
                </select>
            </div>

            <div class="content">
                <button onclick="descubrir();" class="btn btn-round">Descubrir</button>
            </div>
        </div>

        <h5 id="msjTipo" class="mt-2 green-font"></h5>
    </div>
</div>

<script src="{{ asset('/js/viajero.js') }}"></script>

@endsection