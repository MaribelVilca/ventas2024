<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

<script>
const base_url ='<?php echo BASE_URL;?>' </script>
<script src="<?php echo BASE_URL; ?>/views/js/functions_persona.js"></script>
<script src="<?php echo BASE_URL; ?>/views/js/functions_compras.js"></script>
<script src="<?php echo BASE_URL; ?>/views/js/functions_product.js"></script>
     </head>
<body>
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid row" style="background-color: #dbdde0;" data-bs-theme="dark">
      <a  href="#" class="col-2">
        <img src="./views/plantilla/imagenes/IMAGEN.PNG.png" alt="Logo" width="60" height="60" class="">
      </a>
        <form class="d-flex col-6" role="search ">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
         
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="col-2">
            <a href=""></a><img class="col-2 m-2" src="./views/plantilla/imagenes/icono.png" alt=""></a>
            <a href="carrito1.html"><img class="col-2 m-2" src="./views/plantilla/imagenes/icono2.png" alt=""></a>
            <a href="login.html"><img class="col-2 m-2" src="./views/plantilla/imagenes/icono3.png" alt=""></a>
          
        </div>
    </div>
      </nav>
     
      <ul class="nav justify-content-center">
        <li class="col-2">
            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL?>maquillajes"style="color: #0D0D0D;">Maquillajes</a>
        </li>
      </li>
      <li class="col-2">
        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL?>perfumes"style="color: #0D0D0D;">Perfumes</a>
      </li>
    </li>
    <li class="col-2">
        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL?>tratamiento"style="color: #0D0D0D;">Tratamiento Facial</a>
    </li>
        <li class="col-2">
            <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL?>joyeria"style="color: #0D0D0D;">Joyerias</a>
        </li>
      </li>
      <li class="col-2">
        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL?>cuidado"style="color: #0D0D0D;">Cuidado Personal</a>
      </li>
    </li>
    <li class="col-2">
        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL?>ofertas"style="color: #0D0D0D;">Ofertas</a>
    </li>
      </ul>

     
