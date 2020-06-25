let atractivos = {};

$.ajax({
    type: "GET",
    url: '/api/atractivosTodos',
    success: function(data) {
        atractivos = data;
        cargarTabla();
    }
});

function cargarTabla() {
    console.log(atractivos);

    let noResultados = document.getElementById("NoResultados");

    if (atractivos.length) {
        let tabla = document.getElementById("tablaAtractivos");
        let paginacion = document.getElementById("paginacion");

        noResultados.style.display = "none";

        for (let i = 0; i < atractivos.length; i++) {
            let fila = tabla.insertRow(i + 1);

            let celdaImagen = fila.insertCell(0);
            let celdaNombre = fila.insertCell(1);
            let celdaLugar = fila.insertCell(2);
            let celdaClase = fila.insertCell(3);
            //let celdaUbicacion = fila.insertCell(3);
            //let celdaDescripcion = fila.insertCell(4);

            celdaImagen.innerHTML = `<img src="${atractivos[i].imagen}" width="304" height="228" alt="${atractivos[i].nombre}" />`;
            celdaNombre.innerHTML = atractivos[i].nombre;
            celdaLugar.innerHTML = atractivos[i].lugar;
            celdaClase.innerHTML = atractivos[i].clase;
            //celdaUbicacion.innerHTML = atractivos[i].ubicacion;
            //celdaDescripcion.innerHTML = atractivos[i].descripcion;
        }

        if (atractivos.length <= 5) {
            paginacion.style.display = "none";
        } else {
            paginacion.style.display = "block";


            let temp = `
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
                </nav>
            `;

            //puedo usar datatables
            //https://mdbootstrap.com/docs/jquery/tables/pagination/#:~:text=Table%20pagination-,Bootstrap%20table%20pagination,of%20the%20options%20presented%20below.


            let nav = document.createElement("nav");
            nav.innerHTML = temp;
            paginacion.appendChild(nav);

        }
    } else {
        noResultados.style.display = "block";
    }
}