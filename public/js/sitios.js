let atractivos = {};

$.ajax({
    type: "GET",
    url: '/api/atractivosTodos',
    success: function(data) {
        atractivos = data;
        pagination();
    }
});

function pagination() {
    let limite = 10;
    let paginacion = document.getElementById("paginacion");
    let numeroTabs = Math.ceil(atractivos.length / limite);
    let noResultados = document.getElementById("NoResultados");

    if (atractivos.length) {
        let inicio = 0;
        let fin = 0;
        noResultados.style.display = "none";

        /*paginacion.innerHTML = `<li class="page-item disabled"><a class="page-link" href="javascript:prevPage()" id="btn_prev" tabindex="-1">Anterior</a></li>`;
        if (atractivos.length > limite) {
            for (let i = 1; i <= numeroTabs; i++) {
                if (i === 1) {
                    paginacion.innerHTML += `<li class="page-item active"><a class="page-link" href="#">${i}</a></li>`;
                } else {
                    paginacion.innerHTML += `<li class="page-item"><a class="page-link" href="#">${i}</a></li>`;
                }
            }
        } else if (atractivos.length <= limite && atractivos.length > 0) {
            inicio = fin = 0;
            paginacion.innerHTML += `<li class="page-item active"><a class="page-link" href="#">${i}</a></li>`;
        }
        paginacion.innerHTML += `<li class="page-item disabled"><a class="page-link" href="javascript:nextPage()" id="btn_next">Siguiente</a></li>`;
*/
        cargarTabla();

    } else {
        noResultados.style.display = "block";
    }
}

function cargarTabla() {
    console.log();

    let tabla = document.getElementById("tablaAtractivos");

    for (let i = 0; i < atractivos.length; i++) {
        let fila = tabla.insertRow(i + 1);
        let clase = "";

        let celdaImagen = fila.insertCell(0);
        let celdaNombre = fila.insertCell(1);
        let celdaLugar = fila.insertCell(2);
        let celdaClase = fila.insertCell(3);
        let celdaAccion = fila.insertCell(4);
        //let celdaUbicacion = fila.insertCell(3);
        //let celdaDescripcion = fila.insertCell(4);

        switch (atractivos[i].clase) {
            case `c1`:
                clase = `Pack`;
                break;
            case `c2`:
                clase = `Urbano`;
                break;
            case `c3`:
                clase = `Playero`;
                break;
            case `c4`:
                clase = `Visitante`;
                break;
            case `c5`:
                clase = `Gourmet`;
                break;
            case `c6`:
                clase = `Insaciable`;
                break;
            default:
                clase = `Oportunista`;
                break;
        }

        celdaClase.innerHTML = clase;
        celdaImagen.innerHTML = `<img src="${atractivos[i].imagen}" width="250" height="150" alt="${atractivos[i].nombre}" />`;
        celdaNombre.innerHTML = atractivos[i].nombre;
        celdaLugar.innerHTML = atractivos[i].lugar;

        celdaAccion.innerHTML += `<button type="button" onclick="eliminarSitio(${atractivos[i]});" class="btn btn-danger btn-sm mt-4 mb-4 ml-1 float-right">Eliminar</button>`;
        celdaAccion.innerHTML += `<button onclick="llenarEditarSitio(${JSON.stringify(atractivos[i]).split('"').join("&quot;")});" type="button" class="btn btn-warning btn-sm mt-4 mb-4 mr-1 float-right" data-toggle="modal" data-target="#exampleModalCenterEditar">Editar</button>`;

        //celdaUbicacion.innerHTML = atractivos[i].ubicacion;
        //celdaDescripcion.innerHTML = atractivos[i].descripcion;
    }
}

function insertarSitio() {
    let nombre = document.getElementById('nombre').value.valueOf();
    let tipo = document.getElementById('tipo').value.valueOf();
    let imagenes = document.getElementById('imagenes').value.valueOf();
    let lugar = document.getElementById('lugar').value.valueOf();
    let mensaje = document.getElementById('mensaje').value.valueOf();
    let mapa = ""; //document.getElementById('mapa').value.valueOf();
    let video = document.getElementById('video').value.valueOf();

    $.ajax({
        type: "POST",
        url: '/api/agregarAtractivo',
        success: function(data) {
            console.log(data);
        }
    });
}

function llenarEditarSitio(atractivo) {
    document.getElementById('idEditar').value = atractivo.id;
    document.getElementById('nombreEditar').value = atractivo.nombre;
    document.getElementById('lugarEditar').value = atractivo.lugar;
    //document.getElementById('imagenesEditar').value = atractivo.imagenes;

    let clase = "";
    switch (atractivo.clase) {
        case `c1`:
            clase = `pack`;
            break;
        case `c2`:
            clase = `urbano`;
            break;
        case `c3`:
            clase = `playero`;
            break;
        case `c4`:
            clase = `visitante`;
            break;
        case `c5`:
            clase = `gourmet`;
            break;
        case `c6`:
            clase = `insaciable`;
            break;
        default:
            clase = `oportunista`;
            break;
    }
    document.getElementById('tipoEditar').value = clase;
    document.getElementById('mensajeEditar').value = atractivo.descripcion;
    let mapa = ""; //document.getElementById('mapaEditar').value = atractivo.
    document.getElementById('videoEditar').value = atractivo.video;
}

function editarSitio() {
    console.log(document.getElementById('idEditar').value);
}

function eliminarSitio(atractivo) {
    console.log(atractivo);
}