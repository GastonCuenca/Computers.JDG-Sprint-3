<?php
class Autenticacion{
  public static function inicioSesion($datos){
    $_SESSION["userEmail"] = $datos["email"];

    }
  public static function inicioCookies($cookie,$pdo){
    $usuario = BaseMySQL::buscarPorEmail($cookie,$pdo,'usuarios');
    $_SESSION["userEmail"] = $usuario["email"];

  }
}

 ?>
