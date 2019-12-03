<?php
class RegistrarCliente{
//funcion para validar los datos ingresados enviados por $_POST
public function validarDatos($datos){
//arrary de errores
    $errores = [];
    $nac=strtotime($datos["fecha"]);
    $limiteEdad=strtotime("-18 year");
//validacion de errores
    if ($datos) {
      if (strlen($datos["nombre"])==0) {
        $errores[0] = "Debe ingresar su nombre";
      }
      if (strlen($datos["apellido"])==0) {
        $errores[1] = "Debe ingresar su apellido";
      }
      if (!filter_var($datos["email"],FILTER_VALIDATE_EMAIL)) {
        $errores[2] = "El email tiene un formato incorrecto";
      }
      if (strlen($datos["pass"])<8) {
        $errores[4] = "La contraseña tiene menos de 8 caracteres";
      }
      if ($datos["pass"]!=$datos["pass2"]) {
        $errores[4] = "Las contraseñas no coinciden";
        $_POST["pass"] = null;
        $_POST["pass2"] = null;
      }
      if ($datos["fecha"]== null) {
        $errores[5]= "Debes indicar una fecha de nacimiento";
      }
      if ($nac>$limiteEdad) {
        $errores[5] ="Eres menor de edad";
      }
      if ($datos["dni"]==null) {
        $errores[6]= "Debes ingresar tu DNI";
      }
      if (strlen($datos["dni"])!=8) {
        $errores[6]= "El DNI solo puede tener 8 digitos";
        $_POST["dni"] = null;
      }
      if (!filter_var($datos["dni"],FILTER_VALIDATE_INT)) {
        $errores[6]= "Debes ingresar un DNI válido";
      }
      if (strlen($datos["domicilio"])==0) {
        $errores[7] = "Debe ingresar un domicilio para futuras entregas";
      }
      if (strlen($datos["celular"])==0) {
        $errores[8] = "Debe ingresar su numero de celular";
      }
      if (strlen($datos["celular"])!=10) {
        $errores[8] = "sin espacios, ni 0 ni 15, ej: 1123456789";
        $_POST["celular"] = null;
      }
    }
    //retorna el array de errores
    return $errores;
  }
//funcion que crea una instancia de la clase usuario para luego guardarla en la base de datos
  public static function crearCliente($datos){
    //hasheo de contraseña
    $contraHash = password_hash($datos["pass"], PASSWORD_DEFAULT);
    // $datos["avatar"] = "perfilDesconocido.png";
    //crea una instancia de la clase usuario con los datos recibidos por $_POST. El avatar, perfil y val_user se pasan como un para luego ser cargados de forma independiente
    $cliente = new Cliente($datos["nombre"], $datos["apellido"], $datos["email"], $contraHash, $datos["fecha"], $datos["dni"], $datos["domicilio"], $datos["celular"]);
    //retorna la instancia de la clase usuario
    return $cliente;
  }
//funcion para guardar un nuevo usuario
  static public function guardarCliente($pdo, $cliente){
    //genera la consulta sql
      $sql = "INSERT INTO clientes VALUES(default, :nombre, :apellido, :email, :pass, :fecha, :dni, :domicilio, :celular)";
      //prepara la consulta
      $guardarCliente = $pdo->prepare($sql);
      //bindea los datos
      $guardarCliente->bindValue(':nombre', $cliente->getNombre());
      $guardarCliente->bindValue(':apellido', $cliente->getApellido());
      $guardarCliente->bindValue(':email', $cliente->getEmail());
      $guardarCliente->bindValue(':pass', $cliente->getPass());
      $guardarCliente->bindValue(':fecha', $cliente->getFecha());
      $guardarCliente->bindValue(':dni', $cliente->getDni());
      $guardarCliente->bindValue(':domicilio', $cliente->getDomicilio());
      $guardarCliente->bindValue(':celular', $cliente->getCelular());

      //ejecuta la consulta
      $guardarCliente->execute();
  }
//funcion que permite guardar la imagen de perfil y actualizarla en la bd
  public static function guardarPerfil($pdo,$id,$imagen){
    $nombre = $imagen["imagen"]["name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["imagen"]["tmp_name"];
    $rutaDestino = dirname(__DIR__);
    $rutaDestino = $rutaDestino."/images/perfil/";
    $nombreImg = uniqid();
    $rutaDestino = $rutaDestino.$nombreImg.".".$ext;
    move_uploaded_file ($archivoOrigen, $rutaDestino);
//hace la consulta para actualizar la bd
    $sql = "UPDATE usuarios SET perfil ='$nombreImg."."$ext' WHERE id ='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
  }

  function cambiarPass($email,$pass,$pdo){
    $error[] = null;
    $usuario = BaseMySQL::buscarPorEmail($email,$pdo,'clientes');

    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "UPDATE clientes SET pass = '$passHash' WHERE email = '$email'";
    $query = $pdo->prepare($sql);
    $query->execute();

  }

  public static function actualizarDireccion($id,$direccion,$pdo){
    $sql = "UPDATE usuarios SET direccion='$direccion' WHERE id ='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
  }

  public static function actualizarTelefono($id,$telefono,$pdo){
    $sql = "UPDATE usuarios SET telefono='$telefono' WHERE id ='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
  }

  public static function actualizarCelular($id,$celular,$pdo){
    $sql = "UPDATE usuarios SET celular='$celular' WHERE id ='$id'";
    $query = $pdo->prepare($sql);
    $query->execute();
  }

}
 ?>
