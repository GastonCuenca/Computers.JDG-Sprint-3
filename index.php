<?php
include_once("autoload.php");

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<?php include_once('head.php'); ?>
  <title>DJG Computer</title>
</head>
<!-- estilos -->

<body style="background-image: url('images/fondo.jpg');">
  <!-- encabezado -->
<?php include_once('header.php');?>
<!-- carrousel -->
<section>
  <?php
  if (isset($_COOKIE["userEmail"])) {
    $cliente = baseMySQL::buscarPorEmail($_COOKIE["userEmail"],$pdo,'clientes');
    autenticacion::inicioSesion($cliente);}
  if (isset($_SESSION['userEmail'])) :
    $cliente = baseMySQL::buscarPorEmail($_SESSION["userEmail"],$pdo,'clientes');
    ?>
    <style media="screen">
      .btnLogin{
        display: none;
      }
      .btnSalir{
        display: inline;
      }
      .btnRegistro{
        display:none;
      }
      .btnCarrito{
        display: inline;
      }
    </style>
    <?php
  endif;
  ?>


  <div class="container-fluid carrousel mt-2">

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/carrousel1.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/carrousel7.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/carrousel4.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/carrousel2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="images/carrousel3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>

<section class="productos">
  <div class="muestra container-fluid mt-3">
  <div class="row d-flex justify-content-center">
      <div class="col-sm-12 col-md-6 col-lg-4 p-3">
        <img class="img-fluid" src="images/banner-compu.jpg" alt="compu">
        <p class="text-justify p-2"><strong class="h2">COMPUTADORAS </strong>Las computadoras nos permiten resolver muchas tareas importantes de cada día.Te explicamos qué es una computadora, los elementos que la componen y su invención. Conocé cuáles son las marcas recomendadas y sus mejores modelos.
        </p>
        </div>
      <div class="col-sm-12 col-md-6 col-lg-4 p-3">
        <img class="img-fluid" src="images/banner-placa.jpg" alt="compu">
        <p class="text-justify p-2"><strong class="h2">PLACAS DE VIDEO  </strong> Elegí tu marca preferida! Contamos con todas las marcas de Tarjetas de Video. Envíos a todo el país. Línea completa. Atención Personalizada. Amplio stock permanente. Tipos: GTX, GeForce, Radeon, ATI.
        </p>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 p-3">
        <img class="img-fluid" src="images/banner-notebook.jpg" alt="compu">
        <p class="text-justify p-2"><strong class="h2">NOTEBOOKS </strong>Conseguí notebooks para diseño, notebooks gamer, notebooks 14 pulgadas, notebooks 17 pulgadas y comprá al mejor precio. Te Ofrecemos Las Notebooks Con La Ultima Tecnología En Procesadores! Marcas Oficiales
        </p>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 p-3">
        <img class="img-fluid" src="images/banner-monitor.jpg" alt="compu">
        <p class="text-justify p-2"><strong class="h2">MONITORES </strong>Seleccioná y compará las características y últimas innovaciones en los nuevos monitores led y monitores curvos. ¡Encontrá el monitor perfecto para vos!
        </p>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 p-3">
        <img class="img-fluid" src="images/banner-impresora.jpg" alt="compu">
        <p class="text-justify p-2"><strong class="h2">IMPRESORAS </strong>Las impresoras son excelentes herramientas para el trabajo, el hogar y el colegio. Obtené imágines increíbles con las mejores impresoras multifunción e impresora láser.
        </p>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4 p-3">
        <img class="img-fluid" src="images/banner--redes.jpg" alt="compu">
        <p class="text-justify p-2"><strong class="h2">OPTIMIZACION DE REDES </strong>Configuración de seguridad para prevenir accesos no autorizados. Instalación de impresoras wireless y extensores de señal. Diseño, instalación, configuración y mantenimiento.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="gamers">
  <div class="row  p-1">
    <div class="servicio d-flex justify-content-center col-sm-12 col-lg-5">
      <img class=" img-fluid" src="images/pc-gamer.jpg" alt="game">
    </div>
    <div class="d-flex justify-content-center col-sm-12 col-lg-5">
      <p class="text-justify p-4 m-2"><strong class="h2">MUNDO GAMERS </strong><b> Los mejores combos de computadoras gamers. Elegi con confianza y empeza a jugar en un mundo del entretenimiento hecho a tu medida. A otro nivel, Pagina dedicada al mundo gamer. Especializada en la venta de hardware. Nuestros clientes nos buscan porque tenemos los mejores precios del mercado, tenemos una gran cantidad de opciones para elegir en un mercado que es muy amplio.</b>
            </p>
    </div>
  </div>
</section>

<section class="Servicios">
  <div class="muestra container-fluid mt-5">
  <div class="row d-flex justify-content-center m-3">
      <div class=" text-center col-sm-12 col-md-6 col-lg-3">
        <div class="circulo m-1">
          <i class="fas fa-desktop"></i>
          <h2 class="mt-1">SOPORTE TECNICO</h2>
        </div>
        <div class="">
          <p class="text-justify">Diagnóstico y reparación de PC, servidores y Notebooks.
        Optimización y limpieza de virus y spyware. Instalación de periféricos: impresoras, scanners, webcams y otros.
          </p>
        </div>
      </div>
      <div class=" text-center col-sm-12 col-md-6 col-lg-3">
        <div class="circulo m-1">
          <i class="fas fa-edit"></i>
          <h2 class="mt-1">DISEÑO WEB</h2>
        </div>
        <div class="">
          <p class="text-justify">Diseño de Imágen Corporativa, Planes a su Medida. Posicionamiento en Buscadores. Empresa de desarrollo de sitios web, Atención Personalizada en todo el país. Planes Economicos. Sitios Web a Medida. Amplie sus ventas.
          </p>
        </div>
      </div>
      <div class=" text-center col-sm-12 col-md-6 col-lg-3">
        <div class="circulo m-1">
          <i class="fab fa-windows"></i>
          <h2 class="mt-1">SOFTWARE LEGAL</h2>
        </div>
        <div class="">
          <p class="text-justify">Es una iniciativa de las grandes empresas creadoras de software nacional e internacional para proteger los derechos de autor y la propiedad intelectual.
          </p>
        </div>
      </div>
      <div class=" text-center col-sm-12 col-md-6 col-lg-3">
        <div class="circulo m-1">
          <i class="fas fa-network-wired"></i>
          <h2 class="mt-1">HOSTING SERVER</h2>
        </div>
        <div class="">
          <p class="text-justify">Hospeda tu sitio web en Hostinger y experimenta un hosting con tecnología de punta. Hosting rápido y seguro ¡El mejor precio del 2019 garantizado!
          </p>
        </div>
      </div>
    </div>
    </div>
  </section>
  <footer class="p-2">

    <div class="row">
      <nav class="col-sm-6">
        <ul class="text-white">
          <li><a class="text-white" href="#"><b>Inicio</b></a></li>
          <li><a class="text-white" href="#"><b>Información</b></a></li>
          <li><a class="text-white" href="#"><b>Comentarios</b></a></li>
          <li><a class="text-white" href="#"><b>Staff</b></a></li>
          <li><a class="text-white" href="#"><b>Usuario</b></a></li>
        </ul>
      </nav>

      <nav class="col-sm-6">
        <ul>
          <a href=""><i class="redes far fa-envelope"></i></a>
          <a href=""><i class="redes fab fa-facebook-square"></i></a>
          <a href=""><i class="redes fab fa-twitter"></i></a>
          <a href=""><i class="redes fab fa-youtube"></i></a>
          <a href=""><i class="redes fab fa-instagram"></i></a>
        </ul>
      </nav>
    </div>
    <div class="col-12">
      <p class="text-light text-right">Copyright (c) 2019 Create by JDG COMPUTER.</p>
    </div>


  </footer>
  <!-- javascript -->
  <script src="js/jquery.js"type="text/javascript"></script>
  <script src="js/bootstrap.js"type="text/javascript"></script>
  <script src="js/bs-custom-file-input.js"type="text/javascript"></script>
  <script src="js/sweetalert2.all.min.js"></script>
</body>
</html>
