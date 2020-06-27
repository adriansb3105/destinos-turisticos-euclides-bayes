let querySet = {};
let noResultados = document.getElementById('NoResultados');

$.ajax({
    type: "GET",
    url: '/api/atractivosTodos',
    success: function(data) {
        querySet = data;
        if (querySet.length) {
            noResultados.style.display = "none";
        } else {
            noResultados.style.display = "block";
        }
        crearTabla()
    }
});

function insertarSitio() {
    let nombre = document.getElementById('nombre').value.valueOf();
    let tipo = document.getElementById('tipo').value.valueOf();
    let lugar = document.getElementById('lugar').value.valueOf();
    let mensaje = document.getElementById('mensaje').value.valueOf();
    let destino = document.getElementById('destino').value.valueOf();
    let persona = document.getElementById('persona').value.valueOf();
    let edad = document.getElementById('edad').value.valueOf();
    let interes = document.getElementById('interes').value.valueOf();
    let mapa = "mapa";
    let imagen = 'https://upload.wikimedia.org/wikipedia/commons/1/12/Sanatorio_Duran_%281%29.JPG';
    let video = document.getElementById('video').value.valueOf();

    if (nombre && tipo && lugar && mensaje && mapa && imagen && video && destino && persona && edad && interes) {
        $.ajax({
            type: "POST",
            url: `/api/agregarAtractivo`,
            data: {
                nombre: nombre,
                tipo: tipo,
                imagen: imagen,
                lugar: lugar,
                mensaje: mensaje,
                mapa: mapa,
                video: video,
                destino: destino,
                persona: persona,
                edad: edad,
                interes: interes
            },
            success: function(data) {
                document.getElementById('respuesta').innerHTML = "Se ha insertado el sitio correctamente";
                console.log("Se ha insertado el sitio correctamente");

            }
        });
    }
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

function crearTabla() {
    var tabla = $('#table-body')

    for (var i = 1 in querySet) {
        let clase = "";
        switch (querySet[i].clase) {
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

        var fila = `<tr>
        <td><img src="${querySet[i].imagen}" width = "250" height="150" alt="${querySet[i].nombre}" /></td>
        <td>${querySet[i].nombre}</td>
        <td>${querySet[i].lugar}</td>
        <td>${clase}</td>
        <td>
            <button onclick="llenarEditarSitio(${JSON.stringify(querySet[i]).split('"').join("&quot;")});" type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenterEditar">Editar</button>
            <button type="button" onclick="eliminarSitio(${querySet[i]});" class="btn btn-danger btn-sm">Eliminar</button>
        </td></tr>`;

        tabla.append(fila)
    }
}