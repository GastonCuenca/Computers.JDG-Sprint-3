<?php
include_once('autoload.php');

if ($_POST) {

  $cliente = baseMySQL::buscarPorEmail($_POST["email"],$pdo,'clientes');
  $errores = validacion::validarLogin($_POST,$pdo,$cliente);
  if ($errores == null) {
    if (isset($_POST["recuerda"])) {
      cookie::login($_POST);
    }
    autenticacion::inicioSesion($_POST);
    header('location:index.php');
  }
}
 ?>
<!DOCTYPE html>

<html lang="es" dir="ltr">
  <head>
    <?php include_once('head.php'); ?>
    <title>Iniciar Sesion</title>
  </head>
  <body style="background-image: url('images/fondo.jpg')">
    <?php include_once('header.php') ?>
    <style media="screen">
      .btnLogin{
        display: none;
      }
    </style>
    <section class="">
      <div class="container mt-5 d-flex justify-content-center">

          <div class="col-lg-4" style="background-color: rgba(0, 0, 0, 0.5);">

            <h3 class="text-light my-4">Login</h3>
            <div style="height:1px; background-color:white">

            </div>
            <div class="mt-3 p-2">
              <form class="form-horizontal" action="login.php" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <input type="text" class="form-control <?=valid('email')?>" placeholder="ingrese su usuario (email)" value="<?=persistir('email')?><?php if (isset($_GET["email"])) {
                  echo $_GET["email"];} ?>" name="email" />
                <?php if (isset($errores[0])): ?>
                  <li class="text-warning" style="list-style:none"><?=$errores[0] ?></li>
                <?php endif; ?>
                <?php if (isset($errores[1])): ?>
                  <li class="text-warning" style="list-style:none"><?=$errores[1] ?></li>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <input type="password" class="form-control <?=valid('pass')?>" placeholder="ingrese su contraseña" value="<?=persistir('pass')?>" name="pass" selected/>
                <?php if (isset($errores[2])): ?>
                  <li class="text-warning" style="list-style:none"><?=$errores[2] ?></li>
                <?php endif; ?>
              </div>
              <div class="row d-flex justify-content-center">
                <div class="col-5 text-center text-white">
                  <div class="form-group">
                    <input class="" type="checkbox" name="recuerda" value="s"> <label class="control-label" for="">Recuerdame</label>
                  </div>

                </div>
                <div class="col-7 text-center">
                  <a href="olvido.php">¿Olvidó su contraseña?</a>
                </div>
              </div>

              <div class="form-group text-center ">
                <button class="btn btn-danger mt-3 " type="submit" name="button">Ingresar</button>
              </div>
              </form>
            </div>

        </div>
        </div>

    </section>
    <br><br><br>
    <footer class="p-2">
      <div class="row">
        <nav class="col-sm-6">
          <ul class="text-white">
            <li><a class="text-white" href="index.php"><b>Inicio</b></a></li>
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
  </body>
</html>
