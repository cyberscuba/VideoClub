$(document).ready(function () {
    mostrarPeliculas();
    $('#agregarPelicula').click(function () { 
        agregarPelicula();
        
    });
});


function agregarPelicula(){
    var mymodal = new bootstrap.Modal(document.getElementById('modalAgregarPelicula'));
    mymodal.show();
}

function agregar(){
    data = recolectarDatos();
    if(data === undefined) return;
    $.ajax({
        url: "../../controlador/accion/act_registrarPelicula.php",
        type: 'POST',
        data: data,
        success: function (response) {
            resultado = JSON.parse(response);
            if(resultado != 0){
                Swal.fire({
                    icon: 'success',
                    title: 'Felicidades',
                    text: 'Película insertada correctamente'
                })
                mostrarPeliculas();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oppss',
                    text: 'Hubo un error al intentar registrar la película'
                })
            }
        }
    });
}

function recolectarDatos(){
    const nombre = $('#nombre').val();
    const sinopsis = $('#sinopsis').val();
    const precioUnitario = $('#precioUnitario').val();
    const tipo = $('#tipo').val();
    const genero = $('#genero').val();
    const fechaEstreno = $('#fechaEstreno').val();

    if(nombre === '' || sinopsis === '' || precioUnitario === ''
     ||tipo === '' || genero === '' || fechaEstreno === ''){
        Swal.fire({
            icon: 'error',
            title: 'Oppss',
            text: 'Rellene todos los campos'
        })
        return;
    }

    return {
        nombre: nombre,
        sinopsis: sinopsis,
        precioUnitario: precioUnitario,
        idTipo: tipo,
        idGenero: genero,
        fechaEstreno:  fechaEstreno
    }
}

function mostrarPeliculas(){
    $.ajax({
        url: "../../controlador/accion/act_traerPeliculas.php",
        type: "POST",
        success: function (response) {
            peliculas = JSON.parse(response);
            $(".peliculas").empty(); 
            for(var i=0; i<peliculas.length; i++){
                $('.peliculas').append(`
                <div id="pelicula${peliculas[i].idPelicula}" class="col-12 col-md-6 col-lg-4 col-xl-3 d-inline-block justify-content-center mt-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">${peliculas[i].nombre}</h5>
                            <h6>PrecioUnitario: ${peliculas[i].precioUnitario}$</h6>
                            <p class="card-text">Sinopsis: ${peliculas[i].sinopsis}.</p>
                            <button class="btn btn-warning">Editar</button>
                            <button class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </div>
                `);
                document.querySelector('#pelicula'+peliculas[i].idPelicula).childNodes[1].childNodes[1].childNodes[7].setAttribute(
                    "onclick",
                    `editarPelicula(${JSON.stringify(peliculas[i])})`
                )
                document.querySelector('#pelicula'+peliculas[i].idPelicula).childNodes[1].childNodes[1].childNodes[9].setAttribute(
                    "onclick",
                    `eliminarPelicula(${peliculas[i].idPelicula})`
                )
            }
        }
    });
}


function editarPelicula(pelicula){
    var mymodal = new bootstrap.Modal(document.getElementById('modalEditarPelicula'));
    mymodal.show();

    $('#nombreEditar').val(pelicula.nombre);
    $('#sinopsisEditar').val(pelicula.sinopsis);
    $('#precioUnitarioEditar').val(pelicula.precioUnitario);
    $('#tipoEditar').val(pelicula.idTipo);
    $('#generoEditar').val(pelicula.idGenero);
    $('#fechaEstrenoEditar').val(pelicula.fechaEstreno);


    document.querySelector('#editarPelicula').setAttribute(
        "onclick",
        `editar(${pelicula.idPelicula})`
    )

}


function editar(idPelicula){
    const nombre = $('#nombreEditar').val();
    const sinopsis = $('#sinopsisEditar').val();
    const precioUnitario = $('#precioUnitarioEditar').val();
    const tipo = $('#tipoEditar').val();
    const genero = $('#generoEditar').val();
    const fechaEstreno = $('#fechaEstrenoEditar').val();

    if(nombre === '' || sinopsis === '' || precioUnitario === ''
     ||tipo === '' || genero === '' || fechaEstreno === ''){
        Swal.fire({
            icon: 'error',
            title: 'Oppss',
            text: 'Rellene todos los campos'
        })
        return;
    }

    data = {
        idPelicula: idPelicula,
        nombre: nombre,
        sinopsis: sinopsis,
        precioUnitario: precioUnitario,
        idTipo: tipo,
        idGenero: genero,
        fechaEstreno:  fechaEstreno
    }

    $.ajax({
        url: "../../controlador/accion/act_editarPelicula.php",
        type: 'POST',
        data: data,
        success: function (response) {
            resultado = JSON.parse(response);
            if(resultado == 0){
                Swal.fire({
                    icon: 'success',
                    title: 'Felicidades',
                    text: 'Película editata correctamente'
                })
                mostrarPeliculas();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oppss',
                    text: 'Hubo un error al intentar editar la película'
                })
            }
        }
    });

}

function eliminarPelicula(idPelicula){
    $.ajax({
        url: "../../controlador/accion/act_eliminarPelicula.php",
        type: 'POST',
        data: 'idPelicula='+idPelicula,
        success: function (response) {
            resultado = JSON.parse(response);
            if(resultado == 0){
                Swal.fire({
                    icon: 'success',
                    title: 'Felicidades',
                    text: 'Película eliminada correctamente'
                })
                mostrarPeliculas();
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oppss',
                    text: 'Hubo un error al intentar eliminar la película'
                })
            }
        }
    });
}