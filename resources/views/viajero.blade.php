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

        <form>
            <div class="form-group mt-3">
                <label for="destino">Destino</label>
                <select class="form-control" id="destino">
                    <option value="playa">Playa</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="cantidad">Cantidad de personas</label>
                <select class="form-control" id="cantidad">
                    <option value="familia">Familia</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="edad">Rango de edad</label>
                <select class="form-control" id="edad">
                    <option value="todas">Todas las edades</option>
                </select>
            </div>

            <div class="form-group mt-3">
                <label for="interes">Intereses</label>
                <select class="form-control" id="interes">
                    <option value="relajarse">Relajarse</option>
                </select>
            </div>

            <div class="content">
                <button type="submit" class="btn btn-round">Registrarse</button>
            </div>
        </form>

    </div>
</div>

<script src="{{ asset('/js/viajero.js') }}"></script>

@endsection