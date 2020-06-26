/**
 * Este método retorna el los sitios turísticos comparando las entradas del usuario y los registros de la base de datos
 */
function calcularSitios() {
    /**
     * Verifica que los datos ya se hayan cargado de la base de datos
     */
    //if (atractivos.length) {
    let destinoBusqueda = document.getElementById('destinoBusqueda').value.valueOf();
    let cantidadBusqueda = document.getElementById('cantidadBusqueda').value.valueOf();
    let edadBusqueda = document.getElementById('edadBusqueda').value.valueOf();
    let interesBusqueda = document.getElementById('interesBusqueda').value.valueOf();

    $.ajax({
        type: "GET",
        url: `/api/atractivos/${destinoBusqueda}/${cantidadBusqueda}/${edadBusqueda}/${interesBusqueda}`,
        success: function(data) {
            atractivos = data;

            if (atractivos.length) {
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
                document.getElementById('cantidadResultados').innerHTML = atractivos.length;

                for (let i = 0; i < atractivos.length; i++) {
                    let div = document.getElementById('resultados');
                    div.innerHTML += `
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="${atractivos[i].imagen}" alt="${atractivos[i].nombre}" class="img-results">
                                            </div>
                                            <div class="col-5 mt-2">
                                                <p>${atractivos[i].lugar}</p>
                                                <p>${atractivos[i].nombre}</p>
                                            </div>
                                            <div class="col-2">
                                                <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalCenter">
                                                    Ver
                                                </button>
                                            </div>
                                        </div>
                    `;
                }

                console.log(atractivos);
            }
        }
    });

    /**
     * Indica en la pantalla los resultados obtenidos
     */
    /*
    if (profesor == 'Beginner') {
        profesor = 'Principiante';
    } else if (profesor == 'Intermediate') {
        profesor = 'Intermedio';
    } else {
        profesor = 'Avanzado';
    }
    document.getElementById('profesor').innerHTML = profesor;*/
    //}
}