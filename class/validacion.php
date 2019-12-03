<?php
class Validacion{

    public function validarLogin($datos,$pdo,$cliente){
      if ($datos['email'] == null) {
        $errores[0] = "Tiene que ingresar un usuario";
        return $errores;
      }
      $usuario=BaseMySQL::buscarPorEmail($datos['email'],$pdo,'clientes');
      if ($usuario == null) {
        $errores[1] = "No está registrado como usuario";
        $_POST = [];
        return $errores;
      }
      if(password_verify($datos['pass'], $cliente['pass']) == false){
        $errores[2] = "La contraseña es incorrecta";
        $_POST['pass'] = null;
        return $errores;
      }
    }

    public function recuperarPass($datos,$pdo){
      if ($datos['email'] == null) {
        $errores[0] = "Tiene que ingresar un usuario";
        return $errores;
      }
      $usuario=BaseMySQL::buscarPorEmail($datos['email'],$pdo,'clientes');
      if ($usuario == null) {
        $errores[0] = "No está registrado como usuario";
        $_POST = [];
        return $errores;
      }
      if($datos['dni'] == null){
        $errores[1] = "Debes ingresar tu DNI";
        $_POST['dni'] = null;
        return $errores;
      }
      if($datos['dni']!=$usuario['dni']){
        $errores[1] = "El DNI es incorrecto";
        $_POST['dni'] = null;
        return $errores;
      }
      if (strlen($datos['pass']) < 8) {
        $errores[2] = "Debe tener mínimo 8 caracteres";
        return $errores;
      }
      if ($datos['pass']!=$datos['pass2']) {
        $errores[3] = "Las contraseñas no coinciden";
        $_POST['pass'] = null;
        return $errores;
      }
    }


}

 ?>
