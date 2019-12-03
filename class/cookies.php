<?php
class Cookie{
  public static function login($datos){
    setcookie('userEmail',$datos["email"],time()+3600);
  }
}
 ?>
