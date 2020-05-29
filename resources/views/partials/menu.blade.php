<!-- Vertical navbar -->
<div class="vertical-nav bg-white" id="sidebar">
  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <div class="media-body">
        <h4 class="m-0">
          <a href="/" class="nav-link green-font text-bold">
            Destinos Turísticos
          </a>
        </h4>
      </div>
    </div>
  </div>

  <!--
  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">USUARIO</p>

  <div class="py-4 px-3 mb-4 bg-light">
    <div class="media d-flex align-items-center">
      <div class="media-body">

        <form class="text-center">
          <div class="form-group mt-3">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control form-control-sm" id="usuario" placeholder="Nombre de usuario">
          </div>

          <div class="form-group mt-3">
            <label for="contrasena">Contraseña</label>
            <input type="password" class="form-control form-control-sm" id="contrasena" placeholder="Contraseña">
          </div>

          <button type="submit" class="btn">Registrarse</button>
        </form>

      </div>
    </div>
  </div>
-->

  <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">MENÚ</p>

  <ul class="nav flex-column bg-white mb-0">
  <li class="nav-item">
      <a href="/busqueda" class="nav-link text-dark font-italic bg-light">
        <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
        Búsqueda
      </a>
    </li>
    <li class="nav-item">
      <a href="/viajero" class="nav-link text-dark font-italic bg-light">
        <i class="fa fa-th-large mr-3 text-primary fa-fw"></i>
        ¿Qué tipo de viajero eres?
      </a>
    </li>
  </ul>
</div>
<!-- End vertical navbar -->

<!-- Toggle button -->
<div class="fixed-top">
  <nav class="navbar navbar-light">
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm navbar-toggler" data-toggle="collapse">
      <span class="navbar-toggler-icon"></span>
    </button>

    <h1 class="main-title green-font text-bold"><?php echo $title ?></h1>
  </nav>
</div>