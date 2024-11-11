<?php 
include "seguridad/config.php"

?>


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/icon.png">
    <title>Tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <img src="img/enac.png" alt="Logo"  height="50" class="d-inline-block align-text-top">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Tareas</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-3">
    <div class="row mb-4">
        <header class="col-12">
            <h1 class="p-3 bg-primary-subtle border-opacity-10 rounded shadow-sm  text-secondary text-center" >Tareas </h1>
        </header>
    </div>
    <div class="row justify-content-center">
        <div class="col-6 " >
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="nombre" placeholder="Titulo tarea">
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">descripción</label>
                        <textarea class="form-control" id="contenido" rows="3"></textarea>
                    </div>
                    <div class="">
                    <div id="liveAlertPlaceholder"></div>
                        <button onclick="save();" class="w-100 btn-lg btn btn-outline-success" type="submit">GUARDAR</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12" >
                <h2 class="p-3 bg-secondary-subtle border-opacity-10 rounded shadow-sm  text-secondary text-center" >Listado </h2>
        </div>
        <div class="col-12 mt-4 mb-4">

            <div class="card">
                <div class="card-body">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Estado</th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="contenidoTabla">
                          
                    
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="js/shadow.js"></script>
    </body>
</html>