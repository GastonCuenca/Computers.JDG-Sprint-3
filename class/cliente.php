<?php
class Cliente{
  // atributos que corresponde a cada una de las columnas de la tabla 'clientes'

  private $nombre;
  private $apellido;
  private $email;
  private $pass;
  private $fecha;
  private $dni;
  private $domicilio;
  private $celular;

  // funcion constructora

  public function __construct($nombre, $apellido, $email, $pass, $fecha, $dni, $domicilio, $celular){
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->email = $email;
    $this->pass = $pass;
    $this->fecha = $fecha;
    $this->dni = $dni;
    $this->domicilio = $domicilio;
    $this->celular = $celular;
  }
  // seters y geters

  public function getNombre()
   {
       return $this->nombre;
   }

   public function setNombre($nombre)
   {
       $this->nombre = $nombre;

       return $this;
   }

   public function getApellido()
   {
       return $this->apellido;
   }

   public function setApellido($apellido)
   {
       $this->apellido = $apellido;

       return $this;
   }

   public function getEmail()
   {
       return $this->email;
   }

   public function setEmail($email)
   {
       $this->email = $email;

       return $this;
   }

   public function getPass()
   {
       return $this->pass;
   }

   public function setPass($pass)
   {
       $this->pass = $pass;

       return $this;
   }

   public function getFecha()
   {
       return $this->fecha;
   }

   public function setFecha($fecha)
   {
       $this->fecha = $fecha;

       return $this;
   }

   public function getDni()
   {
       return $this->dni;
   }

   public function setSexo($dni)
   {
       $this->dni = $dni;

       return $this;
   }

   public function getDomicilio()
   {
       return $this->domicilio;
   }

   public function setDomicilio($domicilio)
   {
       $this->domicilio = $domicilio;

       return $this;
   }
   public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }
}

 ?>
