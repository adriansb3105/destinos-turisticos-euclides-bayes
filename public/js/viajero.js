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
        descripcionCantidad = 'en pareja sin hijos';
        descripcionEdad = 'de todas las edades';
        descripcionDisposicion = '82';
        descripcionIntereses = 'actualidad, cultura e historia';
    } else if (tipo == 'playero') {

    } else if (tipo == 'visitante') {

    } else if (tipo == 'gourmet') {

    } else if (tipo == 'insaciable') {

    } else if (tipo == 'oportunista') {

    }

    document.getElementById('descripcionObjetivo').innerHTML = `El principal objetivo es "${descripcionObjetivo}"`;
    document.getElementById('descripcionDestino').innerHTML = `Este tipo de viajero prefiere ${descripcionDestino}`;
    document.getElementById('descripcionVolumen').innerHTML = `En promedio suele realizar ${descripcionVolumen} viajes al año`;
    document.getElementById('descripcionCantidad').innerHTML = `Por lo general viaja ${descripcionCantidad}`;
    document.getElementById('descripcionEdad').innerHTML = `Suelen viajar ${descripcionEdad}`;
    document.getElementById('descripcionDisposicion').innerHTML = `Su indice de previsión de consumo de viajes es de ${descripcionDisposicion}%`;
    document.getElementById('descripcionIntereses').innerHTML = `Lo que busca este tipo de viajero es ${descripcionIntereses}`;
}