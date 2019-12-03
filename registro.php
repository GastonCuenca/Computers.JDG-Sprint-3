<?php
include_once('autoload.php');
if ($_POST) {
  $errores = RegistrarCliente::validarDatos($_POST);
  if ($errores == null) {
    $checkUser = baseMySQL::buscarPorDNI($_POST["dni"],$pdo,'clientes');
    if ($checkUser == null) {
      $cliente = RegistrarCliente::crearCliente($_POST);
      RegistrarCliente::guardarCliente($pdo,$cliente);
      header('location:login.php?email='.$_POST["email"]);
    }else{
      $errores[10] = "El DNI ya se encuentra registrado";
      $_POST=[];
    }
  }
}
 ?>
<!DOCTYPE html>

<html lang="es" dir="ltr">
  <head>
    <?php include_once('head.php'); ?>
    <title>Registro de Nuevo Cliente</title>
  </head>
  <body style="background-image: url('images/fondo.jpg')">
    <?php include_once('header.php') ?>
    <style media="screen">
      .btnRegistro{
        display: none;
      }
    </style>
    <section>
      <form class="" action="registro.php" method="POST" enctype="multipart/form-data">
        <div class="container mt-4">
          <div class="row" style="background-color: rgba(0, 0, 0, 0.5);">
          <div class="col-md-4 col-lg-4 d-flex align-items-center text-center">
            <div class="p-2" >
              <h3 class="h3 text-light">¡BIENVENIDO!</h3><br><br>
              <h5 class="text-light">Todos los campos son obligatorios para una registración exitosa</h5>

              <?php if (isset($errores[10])): ?>
                <li class="alert alert-warning mt-5" style="list-style:none"><?=$errores[10] ?></li>
              <?php endif; ?>

            </div>
          </div>
          <div class="col-md-8 col-lg-8 p-3" style="background-color: rgba(0, 0, 0, 0.5);">
            <form class="form-horizontal">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control <?=valid('nombre')?>" placeholder="Nombre" value="<?=persistir('nombre')?>" name="nombre" />
                  <?php if (isset($errores[0])): ?>
                    <li class="text-warning" style="list-style:none"><?=$errores[0] ?></li>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control <?=valid('apellido')?>" placeholder="Apellido" value="<?=persistir('apellido')?>" name="apellido" selected/>
                  <?php if (isset($errores[1])): ?>
                    <li class="text-warning" style="list-style:none"><?=$errores[1] ?></li>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control <?=valid('dni')?>" placeholder="dni (solo números)" value="<?=persistir('dni')?>" name="dni" maxlength="8" minlength="8"/>
                  <?php if (isset($errores[6])): ?>
                    <li class="text-warning" style="list-style:none"><?=$errores[6] ?></li>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <input type="date" class="form-control <?=valid('fecha')?>"  placeholder="fecha de nacimiento" value="<?=persistir('fecha')?>" name="fecha" />
                  <?php if (isset($errores[5])): ?>
                    <li class="text-warning" style="list-style:none"><?=$errores[5] ?></li>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <input type="text" name="domicilio" class="form-control <?=valid('domicilio')?>" placeholder ="Ingrese su domicilio" value="<?=persistir('domicilio')?>"  />
                  <?php if (isset($errores[7])): ?>
                    <li class="text-warning" style="list-style:none"><?=$errores[7] ?></li>
                  <?php endif; ?>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <input type="email" class="form-control <?=valid('email')?>" placeholder="Ingresa tu Email" value="<?=persistir('email')?>" name="email"  />
                  <?php if (isset($errores[2])): ?>
                    <li class="text-warning" style="list-style:none"><?=$errores[2] ?></li>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <input type="number" maxlength="10" name="celular" class="form-control <?=valid('celular')?>" placeholder="celular (sin 0 y sin 15)" value="<?=persistir('celular')?>"  />
                  <?php if (isset($errores[8])): ?>
                    <li class="text-warning" style="list-style:none"><?=$errores[8] ?></li>
                  <?php endif; ?>
                </div>

                <div class="form-group">
                  <input type="password" class="form-control <?=valid('pass')?>" minlength="8" placeholder="Contraseña" value="" name="pass" />
                  <?php if (isset($errores[4])): ?>
                    <li class="text-warning" style="list-style:none"><?=$errores[4] ?></li>
                  <?php endif; ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control <?=valid('pass2')?>" minlength="8" placeholder="Confirmar Contraseña" value="" name="pass2" />
                  <?php if (isset($errores[4])): ?>
                    <br>
                  <?php endif; ?>
                </div>
                <div class="form-group text-center">

                  <button class="btn btn-warning"type="submit" name="button">Registrarse</button>
                </div>
                </div>

              </form>

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
