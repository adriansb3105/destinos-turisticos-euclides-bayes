function description(tipo) {
    let descripcionObjetivo = '';
    let descripcionDestino = '';
    let descripcionVolumen = '';
    let descripcionCantidad = '';
    let descripcionEdad = '';
    let descripcionDisposicion = '';
    let descripcionIntereses = '';

    if (tipo == 'pack') {
        descripcionObjetivo = 'Empaquetar el mundo';
        descripcionDestino = 'la playa';
        descripcionVolumen = '1.3';
        descripcionCantidad = 'en familia';
        descripcionEdad = 'de todas las edades';
        descripcionDisposicion = '59';
        descripcionIntereses = 'relajarse y entretenerse';
    } else if (tipo == 'urbano') {
        descripcionObjetivo = 'Descubrir el mundo';
        descripcionDestino = 'la ciudad';
        descripcionVolumen = '2.7';
        descripcionCantidad = 'en pareja';
        descripcionEdad = 'de todas las edades';
        descripcionDisposicion = '82';
        descripcionIntereses = 'actualidad, cultura e historia';
    } else if (tipo == 'playero') {
        descripcionObjetivo = 'Olvidarse del mundo';
        descripcionDestino = 'la playa';
        descripcionVolumen = '1.4';
        descripcionCantidad = 'con amigos';
        descripcionEdad = 'de 18 a 35 años';
        descripcionDisposicion = '68';
        descripcionIntereses = 'relajarse';
    } else if (tipo == 'visitante') {
        descripcionObjetivo = 'Conocer del mundo';
        descripcionDestino = 'la ciudad';
        descripcionVolumen = '2';
        descripcionCantidad = 'solo';
        descripcionEdad = 'de 36 a 55 años';
        descripcionDisposicion = '78';
        descripcionIntereses = 'entretenerse';
    } else if (tipo == 'gourmet') {
        descripcionObjetivo = 'Saborear del mundo';
        descripcionDestino = 'la montaña';
        descripcionVolumen = '1.6';
        descripcionCantidad = 'en familia';
        descripcionEdad = 'mayores o iguales a 56 años';
        descripcionDisposicion = '64';
        descripcionIntereses = 'la gastronomía';
    } else if (tipo == 'insaciable') {
        descripcionObjetivo = 'Conectar con el mundo';
        descripcionDestino = 'la montaña';
        descripcionVolumen = '2.3';
        descripcionCantidad = 'con amigos';
        descripcionEdad = 'de 18 a 35 años';
        descripcionDisposicion = '70';
        descripcionIntereses = 'la cultura';
    } else if (tipo == 'oportunista') {
        descripcionObjetivo = 'Recorrer el mundo';
        descripcionDestino = 'lo rural';
        descripcionVolumen = '1.8';
        descripcionCantidad = 'solo';
        descripcionEdad = 'de 36 a 55 años';
        descripcionDisposicion = '77';
        descripcionIntereses = 'entretenerse';
    }

    document.getElementById('descripcionObjetivo').innerHTML = `El principal objetivo es "${descripcionObjetivo}"`;
    document.getElementById('descripcionDestino').innerHTML = `Este tipo de viajero prefiere ${descripcionDestino}`;
    document.getElementById('descripcionVolumen').innerHTML = `En promedio suele realizar ${descripcionVolumen} viajes al año`;
    document.getElementById('descripcionCantidad').innerHTML = `Por lo general viaja ${descripcionCantidad}`;
    document.getElementById('descripcionEdad').innerHTML = `Suelen viajar ${descripcionEdad}`;
    document.getElementById('descripcionDisposicion').innerHTML = `Su indice de previsión de consumo de viajes es de ${descripcionDisposicion}%`;
    document.getElementById('descripcionIntereses').innerHTML = `Lo que busca este tipo de viajero es ${descripcionIntereses}`;
}

function descubrir() {
    let clase = {};

    let destinoTipo = document.getElementById('destinoTipo').value.valueOf();
    let cantidadTipo = document.getElementById('cantidadTipo').value.valueOf();
    let edadTipo = document.getElementById('edadTipo').value.valueOf();
    let interesTipo = document.getElementById('interesTipo').value.valueOf();

    $.ajax({
        type: "POST",
        url: `/api/tipos`,
        data: {
            destino: destinoTipo,
            persona: cantidadTipo,
            edad: edadTipo,
            interes: interesTipo
        },
        success: function(data) {
            switch (data) {
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

            let msjTipo = document.getElementById('msjTipo');
            msjTipo.innerHTML = `Su tipo de viajero es <span class="text-bold">${clase}</span>`;
        }
    });
}