<?php session_start();
if (!$_SESSION['ID_USUARIO']) {
    header("Location: login.php");
} ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VideoClub - Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <nav class="py-3 navbar navbar-expand-lg fixed-top auto-hiding-navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="./index.php">VideoClub - Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./logout.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container-fluid mt-5">
        <div class="row">
            <div class="row justify-content-md-center mt-5">
                <div class="col-md-auto">
                    <h1 class="integrales_frecuentes">Todas las películas:</h1>
                    <hr>
                </div>
            </div>
            <button id="agregarPelicula" class="btn btn-primary"> Agregar película</button>
        </div>
        <div class="row peliculas mt-1">
        </div>

    </div>

    <!-- Modal agregarPelicula -->
    <div class="modal fade" id="modalAgregarPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Pelicula</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-agregarPelicula">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h2 class="text-center text-dark mt-5 mb-0">Agrega la película</h2>
                                <div class="text-center mb-1 text-dark">Recuerda rellenar todos los campos!</div>
                                <div class="card my-3">

                                    <div class="card-body cardbody-color p-lg-5">

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="sinopsis">Sinopsis:</label>
                                                <textarea class="form-control" id="sinopsis" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="precioUnitario" name="precioUnitario" placeholder="precioUnitario">
                                        </div>
                                        <div class="mb-3">
                                            <select id="tipo" class="form-select" aria-label="Default select example">
                                                <option value="" selected>Selecciona un tipo</option>
                                                <option value="1">Nuevos lanzamientos</option>
                                                <option value="2">Películas normales</option>
                                                <option value="3">Películas viejas</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <select id="genero" class="form-select" aria-label="Default select example">
                                                <option value="" selected>Selecciona un genero</option>
                                                <option value="1">Acción</option>
                                                <option value="2">Aventura</option>
                                                <option value="3">Romance</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fechaEstreno">Fecha estreno:</label>
                                            <input type="date" class="form-control" id="fechaEstreno" name="fechaEstreno">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="agregar()" data-bs-dismiss="modal">Agregar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    <!-- Modal editarPelicula -->
    <div class="modal fade" id="modalEditarPelicula" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Película</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body-EditarPelicula">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h2 class="text-center text-dark mt-5 mb-0">Edita la película</h2>
                                <div class="text-center mb-1 text-dark">Recuerda rellenar todos los campos!</div>
                                <div class="card my-3">

                                    <div class="card-body cardbody-color p-lg-5">

                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="nombreEditar" name="nombre" placeholder="nombre">
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label for="sinopsis">Sinopsis:</label>
                                                <textarea class="form-control" id="sinopsisEditar" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input type="number" class="form-control" id="precioUnitarioEditar" name="precioUnitario" placeholder="precioUnitario">
                                        </div>
                                        <div class="mb-3">
                                            <select id="tipoEditar" class="form-select" aria-label="Default select example">
                                                <option value="" selected>Selecciona un tipo</option>
                                                <option value="1">Nuevos lanzamientos</option>
                                                <option value="2">Películas normales</option>
                                                <option value="3">Películas viejas</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <select id="generoEditar" class="form-select" aria-label="Default select example">
                                                <option value="" selected>Selecciona un genero</option>
                                                <option value="1">Acción</option>
                                                <option value="2">Aventura</option>
                                                <option value="3">Romance</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fechaEstrenoEditar">Fecha estreno:</label>
                                            <input type="date" class="form-control" id="fechaEstrenoEditar" name="fechaEstreno">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="editarPelicula" type="button" class="btn btn-primary" data-bs-dismiss="modal">Editar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./js/functions.js"></script>


</body>

</html>