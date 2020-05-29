/**
 * Función que calcula, toma como parámetro los valores ca, ec, ea, or
 */
function euclides(respuestas, datos) {
    /**
     * Se crea una variable mínimo con un valor inicial alto, cambiará según se vaya obteniendo un valor más bajo
     */
    let minimo = 9999;
    let resultado = "";

    /**
     * Recorre los registros obtenidos de la tabla de la base de datos
     */
    datos.forEach(function(actual) {
        let valor = 0;

        /**
         * Convierte el objeto actual, que es cada uno de los valores de la base de datos, en un arreglo
         */
        actual = Object.values(actual);

        /**
         * Recorre el arreglo con los valores obtenidos de las respuestas del usuario
         */
        for (i = 0; i < respuestas.length; i++) {
            /**
             * Obtiene el valor númerico de las entradas dadas
             */
            let valorRespuesta = valorNumerico(respuestas[i]);
            let valorActual = valorNumerico(actual[i]);

            /**
             * Toma el valor de cada columna del arreglo de las respuestas del usuario (ca, ec, ea, or) y le resta la misma columna de cada iteración de los valores de la base de datos
             */
            valor += Math.pow((valorRespuesta - valorActual), 2);
        }

        /**
         * Toma el valor obtenido anteriormente y obtiene su raíz cuadrada
         */
        valor = Math.sqrt(valor)

        /**
         * Pregunta si el mínimo es 0 (los valores obtenidos del usuario son iguales a una entrada de la base de datos), y se devuelve ese mismo dato
         */
        if (minimo == 0) {
            return actual[actual.length - 1];
        } else {
            /**
             * Pregunta si el valor mínimo es mayor al valor actual del ciclo, y si es así el valor mínimo toma su valor
             */
            if (minimo > valor) {
                minimo = valor;
                /**
                 * Guarda en la variable resultado el dato que tenga menor distancia hasta el momento
                 */
                resultado = actual[actual.length - 1];
            }
            /**
             * Si no entra a la anterior condición, entonces el valor mínimo permanece y el resultado sigue siendo el de la última distancia menor
             */
        }
    });

    return resultado;
}

/**
 * Obtiene el valor númerico del valor dado en caso de que no sea un valor numéricos
 */
function valorNumerico(valor) {
    switch (valor) {
        case 'F':
        case 'Paraiso':
        case 'CONVERGENTE':
        case 'Beginner':
        case 'DM':
        case 'L':
        case 'N':
        case 'B':
        case 'Low':
            return 1;

        case 'M':
        case 'Turrialba':
        case 'DIVERGENTE':
        case 'Intermediate':
        case 'ND':
        case 'I':
        case 'S':
        case 'Medium':
            return 2;

        case 'ACOMODADOR':
        case 'Advanced':
        case 'O':
        case 'NA':
        case 'H':
        case 'A':
        case 'High':
            return 3;

        case 'ASIMILADOR':
            return 4;

        default:
            return parseFloat(valor);
    }
}