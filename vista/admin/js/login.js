$(document).ready(function () {
    $('#login').click(function () { 
        login();
    });
});

function login(){
    data = recolectarDatos();
    if(data === undefined) return;
    $.ajax({
        url: "../../controlador/accion/act_loginAdministrador.php",
        type: 'POST',
        data: data,
        success: function (response) {
            resultado = JSON.parse(response);
            if(resultado){
                window.location = "./index.php";
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oppss',
                    text: 'Revise sus credenciales e intente nuevamente'
                })
            }
        }
    });
}

function recolectarDatos(){
    const email = $('#email').val();
    const password = $('#password').val();

    if(email === '' || password === ''){
        Swal.fire({
            icon: 'error',
            title: 'Oppss',
            text: 'Rellene todos los campos'
        })
        return;
    }

    return {
        email: email,
        password: password
    }
}