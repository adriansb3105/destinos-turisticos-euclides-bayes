@extends('partials.layout')

@section('content')
<!--
<div class="row">
  <div class="col">
-->
<div class="content">
  <img id="img-principal" src="{{ asset('/img/turismo.jpg') }}" alt="principal" class="img-responsive img-rounded">
</div>

<!--
  </div>
  <div class="col-4">
    <form class="content">
      <h2 class="grey-font mt-5">Abre una cuenta</h2>
      <div class="form-row mt-3">
        <div class="form-group col-md-6">
          <label for="nombre">Nombre</label>
          <input type="text" class="form-control" id="nombre" placeholder="Nombre">
        </div>
        <div class="form-group col-md-6">
          <label for="apellidos">Apellidos</label>
          <input type="text" class="form-control" id="apellidos" placeholder="Apellidos">
        </div>
      </div>

      <div class="form-group mt-3">
        <label for="usuario">Nombre de usuario</label>
        <input type="text" class="form-control" id="usuario" placeholder="Nombre de usuario">
      </div>

      <div class="form-group mt-3">
        <label for="contrasena">Contraseña</label>
        <input type="password" class="form-control" id="contrasena" placeholder="Contraseña">
      </div>

      <div class="form-group mt-3">
        <label for="repitacontrasena">Repita la contraseña</label>
        <input type="password" class="form-control" id="repitacontrasena" placeholder="Repita la contraseña">
      </div>

      <button type="submit" class="btn btn-light">Registrarse</button>
    </form>

  </div>
</div>
-->

@endsection