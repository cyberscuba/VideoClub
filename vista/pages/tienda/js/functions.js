$(document).ready(function () {
    mostrarPeliculas();
    $('#carrito').click(function () { 
        carritoAlquiler();      
    });

    $("#dias").keyup(function () {
        calcularPrecio(); 
    });
});

var carrito = [];

var mymodal;

function mostrarPeliculas(){
    $.ajax({
        url: "../../../controlador/accion/act_traerPeliculas.php",
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
                            <button class="btn btn-primary">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
                `);
                document.querySelector('#pelicula'+peliculas[i].idPelicula).childNodes[1].childNodes[1].childNodes[7].setAttribute(
                    "onclick",
                    `agregarAlCarrito(${JSON.stringify(peliculas[i])})`
                )
            }
        }
    });
}

function agregarAlCarrito(pelicula){
    carrito.push(pelicula);
    

    actualizarCarrito();
}

function actualizarCarrito(){
    $('#carrito').html(`carrito (${carrito.length})`); 
}

function carritoAlquiler(){

    mymodal = new bootstrap.Modal(document.getElementById('modalCarrito'));
    mymodal.show();
    $('.listaPeliculas').empty()
    for(var i=0; i<carrito.length; i++){
        $('.listaPeliculas').append(
            `<li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">${carrito[i].nombre}</div>
                precioUnitario: $${carrito[i].precioUnitario}
            </div>
            </li>`
        );
    }
    calcularPrecio();
}


function calcularPrecio(){
    var precio = 0;
    var dias = parseFloat($('#dias').val());
    for(var i=0; i<carrito.length; i++){

        if(carrito[i].idTipo == 1){
            precio += parseFloat(carrito[i].precioUnitario)* dias; 
        }

        if(carrito[i].idTipo == 2){
            if(dias > 3){
                p = parseFloat(carrito[i].precioUnitario);
                precio += (p)*(3)
                precio += (p+(p*0.15))*(dias-3)
            }else{
                precio += carrito[i].precioUnitario*dias;
            }
             
        }

        if(carrito[i].idTipo == 3){
            if(dias > 5){
                p = parseFloat(carrito[i].precioUnitario);
                precio += (p)*(5)
                precio += (p+(p*0.10))*(dias-5)
            }else{
                precio += carrito[i].precioUnitario*dias;
            }
             
        }
    }
    $('#total').html(precio);
    return precio;
}

function alquilar(){

    var dias = $('#dias').val();
    if(dias === ''){
        Swal.fire({
            icon: 'error',
            title: 'Oppss',
            text: 'Rellene el campo días'
        })
        return;
    }

    $.ajax({
        type: "post",
        url: "../../../controlador/accion/act_registrarAlquiler.php",
        data: "valorTotal="+calcularPrecio() +'&fechaFin='+dias,
        success: function (response) {
            respuesta = JSON.parse(response);
            for(var i = 0; i<carrito.length; i++){
                $.ajax({
                    type: "post",
                    url: "../../../controlador/accion/act_peliculasAlquiler.php",
                    data: 'idAlquiler='+respuesta + '&pelicula='+carrito[i].idPelicula,
                    success: function (response) {
                    }
                });
            }
            Swal.fire({
                icon: 'success',
                title: 'Felicitaciones',
                text: 'Alquiler registrado con exito'
            })
            carrito = [];
            actualizarCarrito(); 
        }
    });

    
}