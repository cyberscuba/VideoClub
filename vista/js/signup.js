$(document).ready(function () {
    $('#registrar').click(function () { 
        registrar();
    });
});


function registrar(){
    data = recolectarDatos();
    if(data === undefined) return;
    $.ajax({
        url: "../controlador/accion/act_signupCliente.php",
        type: 'POST',
        data: data,
        success: function (response) {
            resultado = JSON.parse(response);
            if(resultado.length === 0){
                Swal.fire({
                    icon: 'success',
                    title: 'Felicidades',
                    text: 'Cuenta registrada existosamente',
                })
                vaciarCampos();
            }else{
                var textError = '';
                for(var i=0;i<resultado.length;i++){
                    textError +=  resultado[i];
                }
                Swal.fire({
                    icon: 'error',
                    title: 'Oppss',
                    html: textError
                })
            }
        }
    });
}

function recolectarDatos(){
    const nombre = $('#nombre').val();
    const email = $('#email').val();
    const password = $('#password').val();
    const password2 = $('#password2').val();

    if(password !== password2){
        Swal.fire({
            icon: 'error',
            title: 'Oppss',
            text: 'Las contraseñas no coinciden'
        })
        return;
    }

    return {
        nombre: nombre,
        email: email,
        password: password
    }
}

function vaciarCampos(){
    $('#nombre').val('');
    $('#email').val('');
    $('#password').val('');
    $('#password2').val('');
}