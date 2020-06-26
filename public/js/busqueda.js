let atractivos = {};

$(function() {
    $('#exampleModalCenterVer').on('hidden.bs.modal', function(e) {
        $iframe = $(this).find("iframe");
        $iframe.attr("src", $iframe.attr("src"));
    });

    msjTipoViajero.style.display = "none";
});

/**
 * Este método retorna el los sitios turísticos comparando las entradas del usuario y los registros de la base de datos
 */
function calcularSitios() {
    let div = document.getElementById('resultados');
    div.innerHTML = "";
    let destinoBusqueda = document.getElementById('destinoBusqueda').value.valueOf();
    let cantidadBusqueda = document.getElementById('cantidadBusqueda').value.valueOf();
    let edadBusqueda = document.getElementById('edadBusqueda').value.valueOf();
    let interesBusqueda = document.getElementById('interesBusqueda').value.valueOf();

    $.ajax({
        type: "GET",
        url: `/api/atractivos/${destinoBusqueda}/${cantidadBusqueda}/${edadBusqueda}/${interesBusqueda}`,
        success: function(data) {
            atractivos = data;
            let msjTipoViajero = document.getElementById("msjTipoViajero");
            let msjResultados = document.getElementById("msjResultados");

            if (atractivos.length) {
                msjTipoViajero.style.display = "block";

                let clase = "";
                switch (atractivos[0].clase) {
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

                document.getElementById('tipoViajeroBusqueda').innerHTML = clase;
                msjResultados.innerHTML = `Se encontraron <span class="text-bold">${atractivos.length}</span> resultados`;

                for (let i = 0; i < atractivos.length; i++) {
                    div.innerHTML += `
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="${atractivos[i].imagen}" alt="${atractivos[i].nombre}" width="250" height="150" class="img-results">
                                            </div>
                                            <div class="col-5 mt-2">
                                                <p>${atractivos[i].lugar}</p>
                                                <p>${atractivos[i].nombre}</p>
                                            </div>
                                            <div class="col-2">
                                                <button type="button" onclick="ver(${JSON.stringify(atractivos[i]).split('"').join("&quot;")});" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalCenterVer">
                                                    Ver
                                                </button>
                                            </div>
                                        </div>
                    `;
                }
            } else {
                msjTipoViajero.style.display = "none";
                msjResultados.innerHTML = "No se encontraron resultados";
            }
        }
    });
}

function ver(atractivo) {
    document.getElementById('nombreBusqueda').innerHTML = atractivo.nombre;
    document.getElementById('descripcionBusqueda').innerHTML = atractivo.descripcion;
    let imagenLugarBusqueda = document.getElementById('imagenLugarBusqueda');
    imagenLugarBusqueda.innerHTML = `<img class="d-block w-100" src="${atractivo.imagen}" alt="Sitio">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>${atractivo.lugar}</p>
                                </div>`;

    let videoBusqueda = document.getElementById('videoBusqueda');
    let videoURL = atractivo.video.replace("watch", "embed");
    videoBusqueda.innerHTML = `<iframe width="560" height="315" src="${videoURL}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
}