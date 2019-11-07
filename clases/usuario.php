<?php
/*
*
 */

class Usuario
{
  private $id;
  private $nombre;
  private $apellido;
  private $email;
  private $password;

  function __construct(Array $datos)
  {
    global $db;

    if(isset($datos['id'])){
      $this->id = $datos['id'];
      $this->password = $datos['password'];
    } else {
      //Este if resuelve si usamos json o mysql
      if ($db instanceof DbJson ){
         $this->id = $json->nextId(); //nextID();
       } else {
         $this->id = null;
       }
      $this->password = password_hash($datos['password'], PASSWORD_DEFAULT);
    }
    $this->nombre = $datos['nombre'];
    $this->apellido = $datos['apellido'];
    $this->email = $datos['email'];

  }


  public function getId(){
      return $this->id;
  }
  public function getNombre(){
      return $this->nombre;
  }
  public function getApellido(){
      return $this->apellido;
  }
  public function getEmail(){
      return $this->email;
  }
  public function getPassword(){
      return $this->password;
  }

}
