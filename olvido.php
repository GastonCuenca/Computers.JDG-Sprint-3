<?php
include_once('autoload.php');

if ($_POST) {
  $errores = validacion::recuperarPass($_POST,$pdo);
  if ($errores == null) {
    RegistrarCliente::cambiarPass($_POST['email'],$_POST['pass'],$pdo);
    header('location:login.php?email='.$_POST["email"]);
  }
}
 ?>
<!DOCTYPE html>

<html lang="es" dir="ltr">
  <head>
    <?php include_once('head.php'); ?>
    <title>Recuperar contraseña</title>
  </head>
  <body style="background-image: url('images/fondo.jpg')">
    <?php include_once('header.php') ?>
    <style media="screen">
      .btnLogin{
        display: none;
      }
    </style>
    <section class="">
      <div class="container mt-4 d-flex justify-content-center">

          <div class="col-lg-4" style="background-color: rgba(0, 0, 0, 0.5);">

            <h3 class="text-light my-4">Recuperar contraseña</h3>
            <div style="height:1px; background-color:white">

            </div>
            <div class="mt-3 p-2">
              <form class="form-horizontal" action="olvido.php" method="POST" enctype="multipart/form-data">

              <div class="form-group">
                <input type="text" class="form-control <?=valid('email')?>" placeholder="ingrese su usuario (email)" value="<?=persistir('email')?><?php if (isset($_GET["email"])) {
                  echo $_GET["email"];} ?>" name="email" />
                <?php if (isset($errores[0])): ?>
                  <li class="text-warning" style="list-style:none"><?=$errores[0] ?></li>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <input type="number" class="form-control <?=valid('dni')?>" placeholder="ingrese su DNI" value="<?=persistir('dni')?>" name="dni" selected/>
                <?php if (isset($errores[1])): ?>
                  <li class="text-warning" style="list-style:none"><?=$errores[1] ?></li>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <input type="password" class="form-control <?=valid('pass')?>" placeholder="ingrese su nueva contraseña" value="<?=persistir('pass')?>" name="pass" selected/>
                <?php if (isset($errores[2])): ?>
                  <li class="text-warning" style="list-style:none"><?=$errores[2] ?></li>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <input type="password" class="form-control <?=valid('pass2')?>" placeholder="reingrese su nueva contraseña" value="<?=persistir('pass2')?>" name="pass2" selected/>
                <?php if (isset($errores[3])): ?>
                  <li class="text-warning" style="list-style:none"><?=$errores[3] ?></li>
                <?php endif; ?>
              </div>



              <div class="form-group text-center ">
                <button class="btn btn-danger mt-3 " type="submit" name="button">Ingresar</button>
              </div>
              </form>
            </div>

        </div>
        </div>

    </section>
  </body>
</html>
