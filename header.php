<header class="container-fluid">
  <div class="row">
    <div class="logo col-sm-12 col-md-12 col-lg-3 text-center">
      <a href="index.php"> <img class="img-fluid m-1 p-2" src="images/logo.png" alt="" style="border-radius:30px; width:150px;"></a>
      <?php if (isset($_SESSION["userEmail"])) :
        $cliente = baseMySQL::buscarPorEmail($_SESSION["userEmail"],$pdo,'clientes');
        ?>
        <h5><?=$cliente['nombre']." ".$cliente['apellido']?> </h5>
        <?php
      endif;
      ?>
    </div>
    
    <div class="col-sm-12 col-md-12 col-lg-9 p-2 mt-4 text-center">
      <button type="button" name="button" class="btnRegistro btn- dark btn-dark p-1 m-1"><a href="registro.php" class="btn-lg btn-dark p-1 m-2">Registrarse</a></button>

        <button type="button" name="button" class="btnOferta btn-lg btn-dark p-1 m-1"><a href="" class=" btn-lg btn-dark p-1 m-2">Ofertas</a></button>

        <button class="btnProducto btn-lg btn-dark p-1 m-2"type="button" name="button"><a href="" class="btn-lg btn-dark p-1 m-2" >Productos</a></button>

        <button class="btnServicio btn-lg btn-dark p-1 m-2"type="button" name="button"><a href="" class="btn-lg btn-dark p-1 m-2">Servicios</a></button>

        <button type="button" name="button" class="btnCarrito btn-lg btn-warning p-1 m-1"><a href="" class="btn-lg btn-warning p-1 m-2">Carrito</a></button>

        <button type="button" name="button" class="btnLogin btn-lg btn-dark p-1 m-1"><a href="login.php" class=" btn-lg btn-dark p-1 m-2">Login</a></button>

        <button type="button" name="button" class="btnSalir btn-lg btn-danger p-1 m-1"><a href="salir.php" class=" btn-lg btn-danger p-1 m-2">Salir</a></button>
        <div class="in-line">

      <!-- <button type="button" name="button" class="btnRegistro btn-lg btn-warning p-1 m-1"><a href="registro.php" class="btn-lg btn-warning p-1 m-2">Registrarse</a></button>

      <button type="button" name="button" class="btnOferta btn-lg btn-light p-1 m-1"><a href="" class=" btn-lg btn-light p-1 m-2">Ofertas</a></button>

      <button class="btnProducto btn-lg btn-success p-1 m-2"type="button" name="button"><a href="" class="btn-lg btn-success p-1 m-2" >Productos</a></button>

      <button class="btnServicio btn-lg btn-dark p-1 m-2"type="button" name="button"><a href="" class="btn-lg btn-dark p-1 m-2">Servicios</a></button>

      <button type="button" name="button" class="btnCarrito btn-lg btn-warning p-1 m-1"><a href="" class="btn-lg btn-warning p-1 m-2">Carrito</a></button>

      <button type="button" name="button" class="btnLogin btn-lg btn-danger p-1 m-1"><a href="login.php" class=" btn-lg btn-danger p-1 m-2">Login</a></button>

      <button type="button" name="button" class="btnSalir btn-lg btn-danger p-1 m-1"><a href="salir.php" class=" btn-lg btn-danger p-1 m-2">Salir</a></button>
      <div class="in-line"> -->

      </div>
    </div>
  </div>

</header>
